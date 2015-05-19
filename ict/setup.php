<?php
	//Connects to the server
	require_once '../functions/server.php';
	
	//Define alert as nothing
	$alert="";
	
	//Check if Post is populated
	if(isset($_POST["product"]))
	{
		//Attribute POST values to variables
		$line = $_POST["line"];
		$product = $_POST["product"];		
		$machine = $_POST["machine"];
		
		//Failure for empty line field
		if($line=="0" || $line==0)
		{
			$alert = "Choose a line<br>[Escolha uma linha]";
		}
		//Failure for empty product field
		elseif($product=="0" || $product==0)
		{
			$alert = "Choose a product<br>[Escolha um produto]";
		}
		//Failure for empty machine field
		elseif($machine=="0" || $machine==0)
		{
			$alert = "Choose a machine<br>[Escolha uma máquina]";
		}
		else
		{
			$query = "SELECT c.id Id FROM tbl_ict_config c JOIN tbl_products p ON c.product=p.id WHERE c.line=" . $line . " OR c.product=" . $product . " OR c.machine=" . $machine;
			$result = check_data($query) or die("Erro1: " . mysqli_error($db_link));
			$row = mysqli_fetch_array($result);
			
			//Failure for existing product
			if(mysqli_num_rows($result)<>0)
			{
				$query = "SELECT l.line Line, p.product Product, m.machine Machine 
				FROM tbl_ict_config c 
				JOIN tbl_lines l ON (c.line=l.id) 
				JOIN tbl_products p ON (c.product=p.id)
				JOIN tbl_ict_machines m ON (c.machine=m.id) 
				WHERE c.id=" . $row['Id'];
				$result = check_data($query) or die("Error: " . mysqli_error($db_link));
				
				$row = mysqli_fetch_array($result);
				
				$alert = "Os dados inseridos já existem nos seguintes registros:
				<br>
				<table border='1px' width='100%'>
					<tr>
						<th bgcolor='#cccccc'>
							Line
						</th>
						<th bgcolor='#cccccc'>
							Product
						</th>
						<th bgcolor='#cccccc'>
							Machine
						</th>
					</tr>
					<tr>
						<td>
							" . $row['Line'] . "
						</td>
						<td>
							" . $row['Product'] . "
						</td>
						<td>
							" . $row['Machine'] . "
						</td>
					</tr>
				</table>
				";
			}
			else
			{
				//Insert new product
				$query = "INSERT INTO tbl_ict_config(line,product,machine) VALUES ('" . $line . "','" . $product . "','" . $machine . "')";
				check_data($query) or die("Erro: " . mysqli_error($db_link));
				
				//Refresh the page
				header("Location: setup.php");
			}
		}
	}
?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript">
	
	//Function to switch color of text in select
	function jsColorSwitch()
	{
		//List of <select> tags to be affected by the function
		var select_array = ["line","product","machine"];
		for(i=0;select_array.length;i++)
		{
			if(document.getElementById(select_array[i]).value == "0")
			{
				document.getElementById(select_array[i]).style.color = "#a9a9a9";
			}
			else
			{
				document.getElementById(select_array[i]).style.color = "#000000";
			}
		}
	}
		
</script>

<div id="main">
	<div id="div_left">
    	<h3 class="blue_title">Manage Existing Setups</h3>
        
        <table id="db_list">
            <tr>
            	<th>Line</th>
                <th>Product</th>
                <th>Machine</th>
                <th colspan="2" style="width:1%; white-space:nowrap;">Manage</th>
            </tr>
                <?php
					$query = "SELECT c.id Id, l.line Line, p.product Product, m.machine Machine, mo.model Model 
					FROM tbl_ict_config c 
					JOIN tbl_lines l ON (c.line=l.id) 
					JOIN tbl_products p ON (c.product=p.id)
					JOIN tbl_ict_machines m ON (c.machine=m.id) 
					JOIN tbl_ict_machine_models mo ON (m.model=mo.id) 
					ORDER BY Line ASC";
					$result = check_data($query) or die("Erro: " . mysqli_error($db_link));
					
					$tbl="tbl_ict_config";
					$col="id";
					
					for($j=1;$row=mysqli_fetch_array($result);$j++)
					{
						$color="";
						if($j%2==0){ $color="#dddddd"; }
						else{ $color="#ffffff"; }					
						
						$get_info="tbl=" . $tbl . "&col=" . $col . "&val=" . $row['Id'];
						
						echo "<tr style='background-color:" .  $color . ";'>
								<td>" . $row['Line'] . "</td>
								<td>" . $row['Product'] . "</td>
								<td title='Model: " . $row['Model'] . "'>" . $row['Machine'] . "</td>
								<td align='center'><a href='edit_setup.php?id=" . $row['Id'] . "' title='Edit " . $row['Line'] . " [" . $row['Product'] . "]'><img src='..\images\pencil.png' /></a></td>
								<td align='center'><a href='../data_management/delete.php?" . $get_info . "' title='Delete " . $row['Line'] . " [" . $row['Product'] . "]'><img src='..\images\delete.png' /></a></td>
							  </tr>";
					}
				?>
        	<tr>
            	<th colspan="3">
                	<?php 
						echo "Quantity: " . mysqli_num_rows($result);
					?>
                </th>
                <th colspan="2">
                	<?php
						//Sets the query to be exported to excel
						$query = "SELECT l.line Line, p.product Product, m.machine Machine 
						FROM tbl_ict_config c 
						JOIN tbl_lines l ON (c.line=l.id) 
						JOIN tbl_products p ON (c.product=p.id)
						JOIN tbl_ict_machines m ON (c.machine=m.id) 
						ORDER BY Line ASC";
								
						$query = str_replace("=","%3D",$query); //Encode reserved chars to avoid URL errors
						$query = str_replace(" ","%20",$query); //Encode reserved chars to avoid URL errors
						
						//Define the header for each column and mount the string
						$headings_array = array('Line','Product','Machine');
						$headings = "";
						for($k=0; $k<count($headings_array); $k++)
						{
							if($k==0)
							{
								$headings .= $headings_array[$k];
							}
							else
							{
								$headings .= "." . $headings_array[$k];
							}
						}
						
						//Define the name of the sheet
						$sheetname = "Setup List";
						$sheetname = str_replace(" ","%20",$sheetname); //Encode reserved chars to avoid URL errors
						
						//Define the file name
						$filetype = "SetupList"; //file name --> goes between 'flexmo' and 'datetime'
						$filename = "FleXmo_" . $filetype . "_" . date('d.m.Y_G.i.s'); //Example: FleXmo_ProductList_02.04.2015_15:08:2015.xls
						$filename = str_replace(":","%3A",$filename); //Encode reserved chars to avoid URL errors
						
						//Mount the $_GET info to send in the link
						$excel_get_info = "query=" . $query . "&headings=" . $headings . "&sheetname=" . $sheetname . "&filename=" . $filename;
						
						//The actual link
						echo "<a target='_blank' href='../functions/export_excel.php?" . $excel_get_info . "' title='Export list to Excel'><img src='../images/excel.gif' /></a>";
					?>
                </th>
            </tr>
        </table>
        
    </div> <!-- div_left -->
    
    <div id="div_right"> <!-- This div contains the form to insert new products -->
        <h3 class="blue_title">Insert New Setup Config</h3>
    
        <form name="setup_registration" class="login_form" action="" method="post">
            <p>
            	<!-- <input name="id" type="hidden" value"<?php //if(isset($product) && $alert<>""){ echo $id; }?>" /> -->
                <table class="clean_table" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td width="100%">
                            <select name="line" id="line" onChange="jsColorSwitch();">
                                <option value="0" <?php if(!isset($line)){ echo "selected"; } ?> style="color:#a9a9a9;" >Line [Linha]</option>
                                <?php
                                    //Query info for account <select>
                                    $query = "SELECT * FROM tbl_lines WHERE enabled=1 ORDER BY line ASC";
                                    $result = check_data($query) or die("Error: " . mysqli_error($db_link));
                                    
                                    for($i=1; $query_line = mysqli_fetch_array($result); $i++)
                                    {
                                        //echo $query_line['id'];
                                        $selected = "";
                                        if(isset($line))
                                        {
                                            if($line==$query_line['id']){ $selected="selected"; }
                                        }
                                        echo "<option value='" . $query_line['id'] . "' " . $selected . " style='color:#000000 !important;' >" . $query_line['line'] . "</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="button" class="side_button" name="add_line" value="+" title="Add new line" alt="Add new line" onClick="window.location='../data_management/lines.php'" />
                        </td>
                    </tr>
                </table>
            </p>
            <p>
                <table class="clean_table" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td width="100%">
                            <select name="product" id="product" onChange="jsColorSwitch();">
                                <option value="0" <?php if(!isset($product)){ echo "selected"; } ?> style="color:#a9a9a9;" >Product [Produto]</option>
                                <?php
                                    //Query info for account <select>
                                    $query = "SELECT * FROM tbl_products WHERE enabled=1 ORDER BY product ASC";
                                    $result = check_data($query) or die("Error: " . mysqli_error($db_link));
                                    
                                    for($i=1; $query_product = mysqli_fetch_array($result); $i++)
                                    {
                                        //echo $query_product['id'];
                                        $selected = "";
                                        if(isset($product))
                                        {
                                            if($product==$query_product['id']){ $selected="selected"; }
                                        }
                                        echo "<option value='" . $query_product['id'] . "' " . $selected . " style='color:#000000 !important;' >" . $query_product['product'] . "</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="button" class="side_button" name="add_product" value="+" title="Add new product" onClick="window.location='../data_management/products.php'" />
                        </td>
                    </tr>
                </table>
            </p>
            <p>
                <table class="clean_table" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td width="100%">
                            <select name="machine" id="machine" onChange="jsColorSwitch();">
                                <option value="0" <?php if(!isset($machine)){ echo "selected"; } ?> style="color:#a9a9a9;" >Machine [Máquina]</option>
                                <?php
                                    //Query info for category <select>
                                    $query = "SELECT * FROM tbl_ict_machines WHERE enabled=1 ORDER BY machine ASC";
                                    $result = check_data($query) or die("Error: " . mysqli_error($db_link));
                                                        
                                    for($i=1; $query_machine = mysqli_fetch_array($result); $i++)
                                    {
                                        echo $query_machine['id'];
                                        $selected = "";
                                        if(isset($machine))
                                        {
                                            if($machine==$query_machine['id']){ $selected="selected"; }
                                        }
                                        
                                        echo "<option value='" . $query_machine['id'] . "' " . $selected . " style='color:#000000 !important;' >" . $query_machine['machine'] . "</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="button" class="side_button" name="add_machine" value="+" title="Add new machine" alt="Add new machine"  onClick="window.location='../ict/machines.php'"/>
                        </td>
                    </tr>
                </table>
            </p>
            
            <?php
                    //In case there is an alert
                    if($alert <> "")
                    {
                        echo "<h5 class='red_danger'>" . $alert . "</h5>";
                    }
                    else
                    {
                        echo "<br>";
                    }
            ?>
            
            <p>
                <input type="submit" class="button_blue" id="submit" value="Insert">
             </p>
            
        </form>
    </div> <!-- div_right -->    
</div> <!-- main -->



<script type="text/javascript">
	//Start the funcion at the first load
	jsColorSwitch();
</script>