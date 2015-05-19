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
		$sql="SELECT machine FROM tbl_ict_machines WHERE machine='" . $_POST['machine'] . "' AND id<>" . $_POST['id'];
		$result = check_data($sql) or die("Error: " . mysqli_error($db_link));
		if(mysqli_num_rows($result)<>0)
		{
			$alert = "This machine alredy exists<br>[Essa máquina já existe]";
			$machine_id = $_POST['id'];
		}
		else
		{
			//Mount sql string
			$sql = "UPDATE tbl_ict_machines SET machine='" . $_POST['machine'] . "', model='" . $_POST['model'] . "', serial='" . $_POST['serial'] . "' WHERE id=" . $_POST['id'];
			
			//Execute query
			check_data($sql) or die("Error: " . mysqli_error($db_link));
			
			//Go back to products page
			header("Location: machines.php");
		}		
	}
	else
	{
		$machine_id = $_GET['id'];
	}
		
	//Mount sql string
	$sql = "SELECT m.id Id, m.machine Machine, m.serial Serial, mo.model Model
			FROM tbl_ict_machine_models mo
			JOIN tbl_ict_machines m ON (m.id=mo.id)
			WHERE m.enabled=1 AND m.id=" . $machine_id;
			
	//Execute query
	$result = check_data($sql) or die("Error: " . mysqli_error($db_link));
	
	$row = mysqli_fetch_array($result);
	
	$id = $row['Id'];
	$machine = $row['Machine'];
	$model = $row['Model'];
	$serial = $row['Serial'];
?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<div class="form_div"> <!-- This div contains the form to edit products -->
    <h3 class="blue_title">Edit Product</h3>

    <form name="machine_edit" class="login_form" action="edit_ict_machine.php" method="post">
        <p>
        	<input name="id" type="hidden" value=" <?php echo $id; ?> ">
            <input name="machine" type="text" placeholder="Machine Name" value="<?php echo $machine; ?>" autofocus required>
        </p>
        <p>
            <table class="clean_table" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td width="100%">
                        <select name="model" id="model" onChange="jsColorSwitch();">
                            <?php
                                //Query info for account <select>
                                $query = "SELECT * FROM tbl_ict_machine_models WHERE enabled=1 ORDER BY model ASC";
                                $result = check_data($query) or die("Error: " . mysqli_error($db_link));
                                                    
                                for($i=1; $query_model = mysqli_fetch_array($result); $i++)
                                {
                                    //echo $query_account['id'];
                                    $selected = "";
                                    if($model==$query_model['model']){ $selected="selected"; }
									
                                    echo "<option value='" . $query_model['id'] . "' " . $selected . " style='color:#000000 !important;' >" . $query_model['model'] . "</option>";
                                }					
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="button" class="side_button" name="add_model" value="+" title="Add new account" onClick="window.location='machine_models.php'" />
                    </td>
                </tr>
            </table>           
        </p>
        <p>
			<input name="serial" type="text" placeholder="Serial Number" value="<?php echo $serial; ?>" required>
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