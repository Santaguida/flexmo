<?php
	//Connects to the server
	require_once '..\functions/server.php';
	
	//Define alert as nothing
	$alert="";
	
	//Check if Post is populated
	if(isset($_POST["machine"]))
	{
		//Attribute POST values to variables
		$machine = $_POST["machine"];
		$model = $_POST["model"];
		$serial = $_POST["serial"];
		
		//Failure for empty model field
		if($model=="0" || $model==0)
		{
			$alert = "Choose a model<br>[Escolha um modelo]";
		}
		else
		{
			$query = "SELECT id,enabled FROM tbl_ict_machines WHERE machine='" . $machine . "' AND serial='" . $serial . "'";
			$result = check_data($query) or die("Error: " . mysqli_error($db_link));
			
			//Failure for existing product
			if(mysqli_num_rows($result)<>0)
			{
				$row = mysqli_fetch_array($result);
				if($row['enabled']==0)
				{
					$alert = "This machine alreredy exists! But was deleted.
					<br><br>
					<table width='100%'>
					<tr>
					<td class='top_header_link' align='center'>
					<a href='undelete.php?tbl=tbl_ict_machines&col=id&val=" . $row['id'] . "' title='Undelete'>
					[Undelete Machine]
					</a>
					</td>
					</tr>
					</table>";
				}
				else
				{
					$alert = "This machine alredy exists<br>[Essa máquina já existe]";
				}
			}
			else
			{
				//Insert new product
				$query = "INSERT INTO tbl_ict_machines(machine,model,serial,enabled) VALUES ('" . $machine . "','" . $model . "','" . $serial . "','1')";
				check_data($query) or die("Erro: " . mysqli_error($db_link));
				
				//Refresh the page
				header("Location: machines.php");
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
		var select_array = ["model"];
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
    	<h3 class="blue_title">Manage Existing Machines</h3>
        
        <table id="db_list">
        	<tr>
            	<th>Machine</th>
                <th>Model</th>
                <th>Serial</th>
                <th colspan="2">Manage</th>
            </tr>
                <?php
					$query="SELECT m.id Id, m.machine Machine, m.serial Serial, mo.model Model
							FROM tbl_ict_machine_models mo 
							JOIN tbl_ict_machines m ON (m.model=mo.id) 
							WHERE m.enabled=1 ORDER BY Machine ASC";
					$result = check_data($query) or die("Erro: " . mysqli_error($db_link));
					
					$tbl="tbl_ict_machines";
					$col="id";
					
					for($j=1;$row=mysqli_fetch_array($result);$j++)
					{
						$color="";
						if($j%2==0){ $color="#dddddd"; }
						else{ $color="#ffffff"; }					
						
						$get_info="tbl=" . $tbl . "&col=" . $col . "&val=" . $row['Id'];
						
						echo "<tr style='background-color:" .  $color . ";'>
								<td>" . $row['Machine'] . "</td>
								<td>" . $row['Model'] . "</td>
								<td>" . $row['Serial'] . "</td>
								<td align='center'><a href='edit_ict_machine.php?id=" . $row['Id'] . "' title='Edit " . $row['Machine'] . "'><img src='..\images\pencil.png' /></a></td>
								<td align='center'><a href='delete.php?" . $get_info . "' title='Delete " . $row['Machine'] . "'><img src='..\images\delete.png' /></a></td>
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
						$query="SELECT m.machine Machine, m.serial Serial, mo.model Model 
								FROM tbl_ict_machine_models mo 
								JOIN tbl_ict_machines m ON (m.model=mo.id) 
								WHERE m.enabled=1 ORDER BY Machine ASC";
								
						$query = str_replace("=","%3D",$query); //Encode reserved chars to avoid URL errors
						$query = str_replace(" ","%20",$query); //Encode reserved chars to avoid URL errors
						
						//Define the header for each column and mount the string
						$headings_array = array('Machine','Model','Serial');
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
						$sheetname = "Machine List";
						$sheetname = str_replace(" ","%20",$sheetname); //Encode reserved chars to avoid URL errors
						
						//Define the file name
						$filetype = "MachineList"; //file name --> goes between 'flexmo' and 'datetime'
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
    
    <div id="div_right"> <!-- This div contains the form to insert new machines -->
        <h3 class="blue_title">Insert New Machines</h3>
    
        <form name="machine_registration" class="login_form" action="" method="post">
            <p>
            	<input name="machine" type="text" placeholder="Machine Name" value="<?php if(isset($machine) && $alert<>""){ echo $machine; } ?>" autofocus required>
            </p>
            <p>
                <table class="clean_table" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td width="100%">
                            <select name="model" id="model" onChange="jsColorSwitch();">
                                <option value="0" <?php if(!isset($model)){ echo "selected"; } ?> style="color:#a9a9a9;" >Model [Modelo]</option>
                                <?php
                                    //Query info for account <select>
                                    $query = "SELECT * FROM tbl_ict_machine_models WHERE enabled=1 ORDER BY model ASC";
                                    $result = check_data($query) or die("Error: " . mysqli_error($db_link));
                                    
                                    for($i=1; $query_model = mysqli_fetch_array($result); $i++)
                                    {
                                        echo $query_model['id'];
                                        $selected = "";
                                        if(isset($model))
                                        {
                                            if($model==$query_model['id']){ $selected="selected"; }
                                        }
                                        echo "<option value='" . $query_model['id'] . "' " . $selected . " style='color:#000000 !important;' >" . $query_model['model'] . "</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="button" class="side_button" name="add_model" value="+" title="Add new model" onClick="window.location='machine_models.php'" />
                        </td>
                    </tr>
                </table>
            </p>
            <p>
            	<input name="serial" type="text" placeholder="Serial Number" value="<?php if(isset($serial) && $alert<>""){ echo $serial; } ?>" required>
            </p>
            
            
            <?php
				//In case ther is an alert
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