<?php

$page = $_SERVER['PHP_SELF'];

if(!isset($_SESSION["user"]))
	{		
		$_SESSION["destination"] = $page;
		
		header("location: ..\login");
	}
?>

<link rel="stylesheet" type="text/css" href="..\css/style.css">

<div class="top_header_access">
	<table id="top_header_table"  border="0" width="100%" height="24px" cellspacing="0" style="padding:0px; display:table; height:100%;">
    	<tr>
        	<td width="100%">            	
            </td>
            
            <td style="white-space:nowrap;" class='top_header_link'>
            	<?php
			
                    $trans = "      
                        <a href='..\\functions/language.php?language=portuguese&page=" . $page . "'>
                            <img src='..\images/ptbr.png' alt='Portuiguês' style='width:20px;height:12px;border:0'>
                        </a>
                        <a href='..\\functions/language.php?language=english&page=" . $page . "'>
                            <img src='..\images/eng.png' alt='English' style='width:20px;height:12px;border:0'>
                        </a>
                        ";
                        //Defining string for when there's a session established
                    $session_text = "
                            <a href='user_edit.php' alt='User data management' class='headeraccess_link'>"
                                    . $_SESSION["name"] . " (" . $_SESSION["user"] . ")
                            </a>						
                            &nbsp;||&nbsp;						
                            <a href='..\login\logout.php' alt='User Logout' class='header_access_link'>
                                    Logout
                            </a>";					

                    echo $session_text . " " . $trans;

                ?>
            </td>
            
            <td>
            &nbsp;&nbsp;
            </td>
        </tr>
    </table>
</div> <!-- /.top_header_access -->