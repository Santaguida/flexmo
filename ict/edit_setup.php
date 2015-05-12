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
		$sql="SELECT line FROM tbl_ict_config WHERE (line='" . $_POST['line'] . "' OR product=" . $_POST['product'] . " OR machine='" . $_POST['machine'] . "') AND id<>" . $_POST['id'];
		$result = check_data($sql) or die("Error: " . mysqli_error($db_link));
		if(mysqli_num_rows($result)<>0)
		{
			$alert = "The inserted data already exists in another registry<br>[Os dados inseridos já existem em outro registro]";
			$setup_id = $_POST['id'];
		}
		else
		{
			//Mount sql string
			$sql = "UPDATE tbl_ict_config SET line='" . $_POST['line'] . "', product=" . $_POST['product'] . ", machine=" . $_POST['machine'] . " WHERE id=" . $_POST['id'];
			
			//Execute query
			check_data($sql) or die("Error: " . mysqli_error($db_link));
			
			//Go back to products page
			header("Location: setup.php");
		}
	}
	else
	{
		$setup_id = $_GET['id'];
	}
	
	//Mount sql string
	$sql = "SELECT l.line Line, p.product Product, m.machine Machine 
			FROM tbl_ict_config c 
			JOIN tbl_lines l ON (c.line=l.id) 
			JOIN tbl_products p ON (c.product=p.id)
 			JOIN tbl_ict_machines m ON (c.machine=m.id)  
			WHERE c.id=" . $setup_id . 
			" ORDER BY Line ASC";
			
	//Execute query
	$result = check_data($sql) or die("Error: " . mysqli_error($db_link));
	
	$row = mysqli_fetch_array($result);
	
	$id = $setup_id;
	$line = $row['Line'];
	$product = $row['Product'];
	$machine = $row['Machine'];
?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<div class="form_div"> <!-- This div contains the form to edit products -->
    <h3 class="blue_title">Edit Setup</h3>

    <form name="setup_edit" class="login_form" action="edit_setup.php" method="post">
        <p>
        	<input name="id" type="hidden" value=" <?php echo $id; ?> ">
            <table class="clean_table" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td width="100%">
                        <select name="line" id="line" onChange="jsColorSwitch();">
                            <?php
                                //Query info for account <select>
                                $query = "SELECT * FROM tbl_lines WHERE enabled=1 ORDER BY line ASC";
                                $result = check_data($query) or die("Error: " . mysqli_error($db_link));
                                                    
                                for($i=1; $query_line = mysqli_fetch_array($result); $i++)
                                {
                                    //echo $query_account['id'];
                                    $selected = "";
                                    if($line==$query_line['line']){ $selected="selected"; }
									
                                    echo "<option value='" . $query_line['id'] . "' " . $selected . " style='color:#000000 !important;' >" . $query_line['line'] . "</option>";
                                }					
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="button" class="side_button" name="add_line" value="+" title="Add new line" onClick="window.location='../data_management/lines.php'" />
                    </td>
                </tr>
            </table> 
        </p>
        <p>
            <table class="clean_table" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td width="100%">
                        <select name="product" id="product" onChange="jsColorSwitch();">
                            <?php
                                //Query info for account <select>
                                $query = "SELECT * FROM tbl_products WHERE enabled=1 ORDER BY product ASC";
                                $result = check_data($query) or die("Error: " . mysqli_error($db_link));
                                                    
                                for($i=1; $query_product = mysqli_fetch_array($result); $i++)
                                {
                                    //echo $query_account['id'];
                                    $selected = "";
                                    if($product==$query_product['product']){ $selected="selected"; }
									
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
                            <?php
                                //Query info for category <select>
                                $query = "SELECT * FROM tbl_ict_machines WHERE enabled=1 ORDER BY machine ASC";
                                $result = check_data($query) or die("Error: " . mysqli_error($db_link));
                                                    
                                for($i=1; $query_machine = mysqli_fetch_array($result); $i++)
                                {
                                    //echo $query_category['id'];
                                    $selected = "";
                                    if($machine==$query_machine['machine']){ $selected="selected"; }
                                    
                                    echo "<option value='" . $query_machine['id'] . "' " . $selected . " style='color:#000000 !important;' >" . $query_machine['machine'] . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="button" class="side_button" name="add_machine" value="+" title="Add new machine" onClick="window.location='../data_management/machines.php'"/>
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