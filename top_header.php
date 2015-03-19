<?php
if(!isset($_SESSION["user"]))
	{
		header("location: login.php");
	}
?>

<link rel="stylesheet" type="text/css" href="style.css">

<div class="top_header_access">
	<table id="top_header_table"  border="0" width="100%" height="24px" cellspacing="0" style="padding:0px; display:table; height:100%;">
    	<tr>
        	<td width="100%">            	
            </td>
            
            <td style="white-space:nowrap;" class='top_header_link'>
            	<?php
					//Defining heredoc for when there's a session established
					$session_text = "
						<a href='user_edit.php' alt='User data management' class='header_access_link'>"
							. $_SESSION["name"] . " (" . $_SESSION["user"] . ")
						</a>						
						&nbsp;||&nbsp;						
						<a href='logout.php' alt='User Logout' class='header_access_link'>
							Logout
						</a>";

					//Defining heredoc for when there's a session established
					$ok_session_text = "
						<a href='user_edit.php' alt='User data management' class='header_access_link'>
							Gabriel Nazato (saognaza)
						</a>						
						&nbsp;||&nbsp;						
						<a href='logout.php' alt='User Logout' class='header_access_link'>
							Logout
						</a>";
					
						echo $ok_session_text;

				?>
            </td>
            
            <td>
            &nbsp;&nbsp;
            </td>
        </tr>
    </table>
</div> <!-- /.top_header_access -->