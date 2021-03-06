<?php
	//Connects to the server
	require_once '..\functions/server.php';
	
	//Define alert as nothing
	$alert="";
	
	//Check if Post is populated
	if(isset($_POST["product"]))
	{
		//Attribute POST values to variables
		$product = $_POST["product"];
		$account = $_POST["account"];
		$category = $_POST["category"];
		
		//Failure for empty account field
		if($account=="0" || $account==0)
		{
			$alert = "Choose an account<br>[Escolha uma categoria]";
		}
		//Failure for empty category field
		elseif($category=="0" || $category==0)
		{
			$alert = "Choose a category<br>[Escolha uma categoria]";
		}
		else
		{
			$query = "SELECT id,enabled FROM tbl_products WHERE product='" . $product . "' AND account=" . $account;
			$result = check_data($query) or die("Erro: " . mysqli_error($db_link));
			
			//Failure for existing product
			if(mysqli_num_rows($result)<>0)
			{
				$row = mysqli_fetch_array($result);
				if($row['enabled']==0)
				{
					$alert = "This product alreredy exists! But was deleted.
					<br><br>
					<table width='100%'>
					<tr>
					<td class='top_header_link' align='center'>
					<a href='enable.php?tbl=tbl_products&col=id&val=" . $row['id'] . "' title='Undelete'>
					[Undelete Product]
					</a>
					</td>
					</tr>
					</table>";
				}
				else
				{
					$alert = "This product alredy exists<br>[Esse produto já existe]";
				}				
			}
			else
			{
				//Insert new product
				$query = "INSERT INTO tbl_products(product,account,category,enabled) VALUES ('" . $product . "','" . $account . "','" . $category . "','1')";
				check_data($query) or die("Erro: " . mysqli_error($db_link));
				
				//Refresh the page
				header("Location: products.php");
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
		var select_array = ["account","category"];
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
    	<h3 class="blue_title">Manage Existing Products</h3>
        
        <table id="db_list">
            <tr>
            	<th>Product</th>
                <th>Account</th>
                <th>Category</th>
                <th colspan="2">Manage</th>
            </tr>
                <?php
					$query="SELECT p.id Id, p.product Product,a.account Account,c.category Category 
					FROM tbl_accounts a 
					JOIN tbl_products p ON (p.account=a.id) 
					JOIN tbl_product_category c ON (c.id=p.category) 
					WHERE p.enabled=1 ORDER BY Product ASC";
					$result = check_data($query) or die("Erro: " . mysqli_error($db_link));
					
					$tbl="tbl_products";
					$col="id";
					
					for($j=1;$row=mysqli_fetch_array($result);$j++)
					{
						$color="";
						if($j%2==0){ $color="#dddddd"; }
						else{ $color="#ffffff"; }					
						
						$get_info="tbl=" . $tbl . "&col=" . $col . "&val=" . $row['Id'];
						
						echo "<tr style='background-color:" .  $color . ";'>
								<td>" . $row['Product'] . "</td>
								<td>" . $row['Account'] . "</td>
								<td>" . $row['Category'] . "</td>
								<td align='center'><a href='edit_product.php?id=" . $row['Id'] . "' title='Edit " . $row['Product'] . "'><img src='..\images\pencil.png' /></a></td>
								<td align='center'><a href='disable.php?" . $get_info . "' title='Delete " . $row['Product'] . "'><img src='..\images\delete.png' /></a></td>
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
						$query="SELECT p.product Product,a.account Account,c.category Category 
								FROM tbl_accounts a 
								JOIN tbl_products p ON (p.account=a.id) 
								JOIN tbl_product_category c ON (c.id=p.category) 
								WHERE p.enabled=1 ORDER BY Product ASC";
								
						$query = str_replace("=","%3D",$query); //Encode reserved chars to avoid URL errors
						$query = str_replace(" ","%20",$query); //Encode reserved chars to avoid URL errors
						
						//Define the header for each column and mount the string
						$headings_array = array('Product','Account','Category');
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
						$sheetname = "Product List";
						$sheetname = str_replace(" ","%20",$sheetname); //Encode reserved chars to avoid URL errors
						
						//Define the file name
						$filetype = "ProductList"; //file name --> goes between 'flexmo' and 'datetime'
						$filename = "FleXmo_" . $filetype . "_" . date('d.m.Y_G:i:s'); //Example: FleXmo_ProductList_02.04.2015_15:08:2015.xls
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
        <h3 class="blue_title">Insert New Products</h3>
    
        <form name="product_registration" class="login_form" action="" method="post">
            <p>
            	<!-- <input name="id" type="hidden" value"<?php //if(isset($product) && $alert<>""){ echo $id; }?>" /> -->
                <input name="product" type="text" placeholder="Product Name" value="<?php if(isset($product) && $alert<>""){ echo $product; } ?>" autofocus required>
            </p>
            <p>
                <table class="clean_table" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td width="100%">
                            <select name="account" id="account" onChange="jsColorSwitch();">
                                <option value="0" <?php if(!isset($account)){ echo "selected"; } ?> style="color:#a9a9a9;" >Account [Conta]</option>
                                <?php
                                    //Query info for account <select>
                                    $query = "SELECT * FROM tbl_accounts WHERE enabled=1 ORDER BY account ASC";
                                    $result = check_data($query) or die("Erro: " . mysqli_error($db_link));
                                    
                                    for($i=1; $query_account = mysqli_fetch_array($result); $i++)
                                    {
                                        echo $query_account['id'];
                                        $selected = "";
                                        if(isset($account))
                                        {
                                            if($account==$query_account['id']){ $selected="selected"; }
                                        }
                                        echo "<option value='" . $query_account['id'] . "' " . $selected . " style='color:#000000 !important;' >" . $query_account['account'] . "</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="button" class="side_button" name="add_account" value="+" title="Add new account" alt="Add new account" onClick="window.location='accounts.php'" />
                        </td>
                    </tr>
                </table>
            </p>
            <p>
                <table class="clean_table" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td width="100%">
                            <select name="category" id="category" onChange="jsColorSwitch();">
                                <option value="0" <?php if(!isset($category)){ echo "selected"; } ?> style="color:#a9a9a9;" >Category [Categoria]</option>
                                <?php
                                    //Query info for category <select>
                                    $query = "SELECT * FROM tbl_product_category WHERE enabled=1 ORDER BY category ASC";
                                    $result = check_data($query) or die("Erro: " . mysqli_error($db_link));
                                                        
                                    for($i=1; $query_category = mysqli_fetch_array($result); $i++)
                                    {
                                        echo $query_category['id'];
                                        $selected = "";
                                        if(isset($category))
                                        {
                                            if($category==$query_category['id']){ $selected="selected"; }
                                        }
                                        
                                        echo "<option value='" . $query_category['id'] . "' " . $selected . " style='color:#000000 !important;' >" . $query_category['category'] . "</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="button" class="side_button" name="add_category" value="+" title="Add new category" alt="Add new category"  onClick="window.location='product_category.php'"/>
                        </td>
                    </tr>
                </table>
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