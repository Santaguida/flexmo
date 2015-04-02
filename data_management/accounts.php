<?php
	//Connects to the server
	require_once '..\functions/server.php';
	
	//Define alert as nothing
	$alert="";
	
	//Check if Post is populated
	if(isset($_POST["account"]))
	{
		//Attribute POST values to variables
		$id="";
		$account = $_POST["account"];
		
		$query = "SELECT id,enabled FROM tbl_accounts WHERE account='" . $account . "'";
		$result = check_data($query) or die("Erro: " . mysqli_error($db_link));
			
		//Failure for existing product
		if(mysqli_num_rows($result)<>0)
		{
			$row = mysqli_fetch_array($result);
			if($row['enabled']==0)
			{
				$alert = "This account alreredy exists! But was deleted.
				<br><br>
				<table width='100%'>
				<tr>
				<td class='top_header_link' align='center'>
				<a href='undelete.php?tbl=tbl_accounts&col=id&val=" . $row['id'] . "' title='Undelete'>
				[Undelete Account]
				</a>
				</td>
				</tr>
				</table>";
				$id = $row['id'];
			}
			else
			{
				$alert = "This product alredy exists<br>[Esse produto já existe]";
			}				
		}
		else
		{
			//Insert new product
			$query = "INSERT INTO tbl_accounts(account, enabled) VALUES ('" . strtoupper($account) . "','1')";
			check_data($query) or die("Erro: " . mysqli_error($db_link));
			
			//Refresh the page
			header("Location: accounts.php");
		}
	}
?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<div id="main_small">
	<div id="div_left_small">
    	<h3 class="blue_title">Manage Existing Accounts</h3>
        
        <table id="db_list">
        	<tr>
                <th width="100%">Account</th>
                <th>Manage</th>
            </tr>
                <?php
					$query="SELECT id, account 
					FROM tbl_accounts
					WHERE enabled=1 ORDER BY account ASC";
					$result = check_data($query) or die("Erro: " . mysqli_error($db_link));
					
					$tbl="tbl_accounts";
					$col="id";
					
					for($j=1;$row=mysqli_fetch_array($result);$j++)
					{
						$color="";
						if($j%2==0){ $color="#dddddd"; }
						else{ $color="#ffffff"; }					
						
						$get_info="tbl=" . $tbl . "&col=" . $col . "&val=" . $row['id'];
						
						echo "<tr style='background-color:" .  $color . ";'>
								<td>" . $row['account'] . "</td>
								<td align='center'><a href='delete.php?" . $get_info . "' title='Delete " . $row['account'] . "'><img src='..\images\delete.png' /></a></td>
							  </tr>";
					}				
				?>
        	<tr>
            	<th>
                	<?php 
						echo "Quantity: " . mysqli_num_rows($result);
					?>
                </th>
                <th>
                	<?php echo "<a href='' title='Export list to Excel'><img src='..\images/excel.gif' /></a>"; ?>
                </th>
            </tr>
        </table>
        
    </div> <!-- div_left -->
    
    <div id="div_right_small"> <!-- This div contains the form to insert new products -->
        <h3 class="blue_title">Insert New Accounts</h3>
    
        <form name="account_registration" class="login_form" action="accounts.php" method="post">
            <p>
            	<input name="id" type="hidden" value"<?php if(isset($id) && $alert<>""){ echo $id; }?>" />
                <input name="account" type="text" placeholder="Account Name" value="<?php if(isset($account) && $alert<>""){ echo $account; } ?>" autofocus required>
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