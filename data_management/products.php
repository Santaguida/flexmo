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
			$query = "SELECT product FROM tbl_products WHERE product='" . $product . "'";
			$result = check_data($query);
			
			//Failure for existing product
			//if(!is_null($result))
			if(mysqli_num_rows($result)<>0)
			{
				$alert = "This product alredy exists<br>[Esse produto já existe]";
			}
			else
			{
				//Insert new product
				$query = "INSERT INTO tbl_products(product,account,category,enabled) VALUES ('" . $product . "','" . $account . "','" . $category . "','1')";
				check_data($query) or die("Erro: " . mysql_error());
				
				//Refresh the page
				header("Location: products.php?success=yes");
			}
		}
	}
?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript">
	
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
            	<th>Product/Account</th>
                <th>Category</th>
                <th colspan="2">Manage</th>
            </tr>
                <?php
					$query="SELECT p.product Product,a.account Account,c.category Category 
					FROM tbl_accounts a 
					JOIN tbl_products p ON (p.account=a.id) 
					JOIN tbl_product_category c ON (c.id=p.category) 
					WHERE p.enabled=1";
					$result = check_data($query);
					for($j=1;$row=mysqli_fetch_array($result);$j++)
					{
						$color="";
						if($j%2==0){ $color="#dddddd"; }
						else{ $color="#ffffff"; }
						
						echo "<tr style='background-color:" .  $color . ";'>
								<td>" . $row['Product'] . " [" . $row['Account'] . "]</td>
								<td>" . $row['Category'] . "</td>
								<td align='center'><a href='products.php?func=edit' title='Edit Entry'><img src='..\images\pencil.png' /></a></td>
								<td align='center'><a href='' title='Delete Entry'><img src='..\images\delete.png' /></a></td>
							  </tr>";
					}
				
				?>
        </table>
        
    </div> <!-- div_left -->
    
    <div id="div_right"> <!-- This div contains the form to insert new products -->
        <h3 class="blue_title">Insert New Products</h3>
    
        <form name="product_registration" class="login_form" action="" method="post">
            <p>
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
                                    $result = check_data($query);
                                                        
                                    for($i=1; $query_account = mysqli_fetch_array($result); $i++)
                                    {
                                        echo $query_account['id'];
                                        $selected = "";
                                        if(isset($account))
                                        {
                                            if($account==$query_account['id']){$selected="selected";}
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
                                    $result = check_data($query);
                                                        
                                    for($i=1; $query_category = mysqli_fetch_array($result); $i++)
                                    {
                                        echo $query_category['id'];
                                        $selected = "";
                                        if(isset($category))
                                        {
                                            if($category==$query_category['id']){$selected="selected";}
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
                    //In case $invalid_login is set to "true", warns of wrong user
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