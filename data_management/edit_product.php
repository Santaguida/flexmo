<?php
	//Connects to the server
	require_once '..\functions/server.php';
	
	$alert="";
	
	//In case there's no GET info
	if(!isset($_GET['id']) && !isset($_POST['id']))
	{
		die("Error: GET or POST info not set! <br><br><a href='javascript:history.go(-1)' title='Go back to last page'>Back</a>");
	}
	
	//In case there is POST info
	if(isset($_POST['id']))
	{	
		//Check if the product already exists
		$sql="SELECT product FROM tbl_products WHERE product='" . $_POST['product'] . "' AND account=" . $_POST['account'] . " AND id<>" . $_POST['id'];
		$result = check_data($sql) or die("Error: " . mysqli_error($db_link));
		if(mysqli_num_rows($result)<>0)
		{
			$alert = "This product alredy exists<br>[Esse produto já existe]";
			$product_id = $_POST['id'];
		}
		else
		{
			//Mount sql string
			$sql = "UPDATE tbl_products SET product='" . $_POST['product'] . "', account=" . $_POST['account'] . ", category=" . $_POST['category'] . " WHERE id=" . $_POST['id'];
			
			//Execute query
			check_data($sql) or die("Error: " . mysqli_error($db_link));
			
			//Go back to products page
			header("Location: products.php");
		}		
	}
	else
	{
		$product_id = $_GET['id'];
	}
		
	//Mount sql string
	$sql = "SELECT p.id Id, p.product Product,a.account Account,c.category Category 
			FROM tbl_accounts a 
			JOIN tbl_products p ON (p.account=a.id)
			JOIN tbl_product_category c ON (c.id=p.category)
			WHERE p.enabled=1 AND p.id=" . $product_id;
			
	//Execute query
	$result = check_data($sql) or die("Erro: " . mysqli_error($db_link));
	
	$row = mysqli_fetch_array($result);
	
	$id = $row['Id'];
	$product = $row['Product'];
	$account = $row['Account'];
	$category = $row['Category'];
?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<div class="form_div"> <!-- This div contains the form to edit products -->
    <h3 class="blue_title">Edit Product</h3>

    <form name="product_edit" class="login_form" action="edit_product.php" method="post">
        <p>
        	<input name="id" type="hidden" value=" <?php echo $id; ?> ">
            <input name="product" type="text" placeholder="Product Name" value="<?php echo $product; ?>" autofocus required>
        </p>
        <p>
            <table class="clean_table" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td width="100%">
                        <select name="account" id="account" onChange="jsColorSwitch();">
                            <?php
                                //Query info for account <select>
                                $query = "SELECT * FROM tbl_accounts WHERE enabled=1 ORDER BY account ASC";
                                $result = check_data($query) or die("Erro: " . mysqli_error($db_link));
                                                    
                                for($i=1; $query_account = mysqli_fetch_array($result); $i++)
                                {
                                    //echo $query_account['id'];
                                    $selected = "";
                                    if($account==$query_account['account']){ $selected="selected"; }
									
                                    echo "<option value='" . $query_account['id'] . "' " . $selected . " style='color:#000000 !important;' >" . $query_account['account'] . "</option>";
                                }					
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="button" class="side_button" name="add_account" value="+" title="Add new account" onClick="window.location='accounts.php'" />
                    </td>
                </tr>
            </table>           
        </p>
        <p>
            <table class="clean_table" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td width="100%">
                        <select name="category" id="category" onChange="jsColorSwitch();">
                            <?php
                                //Query info for category <select>
                                $query = "SELECT * FROM tbl_product_category WHERE enabled=1 ORDER BY category ASC";
                                $result = check_data($query) or die("Erro: " . mysqli_error($db_link));
                                                    
                                for($i=1; $query_category = mysqli_fetch_array($result); $i++)
                                {
                                    //echo $query_category['id'];
                                    $selected = "";
                                    if($category==$query_category['category']){ $selected="selected"; }
                                    
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
            <input type="submit" class="button_blue" id="submit" value="Save">
        </p>
        
    </form>
</div> <!-- div_right -->