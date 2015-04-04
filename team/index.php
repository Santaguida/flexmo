
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php //echo $comm['pgTitle']; ?></title>

    <?php
    
    // Inclui cabeçario
    include_once '..\functions/header.php';
    
    ?>

</head>
<body> 
    
    <?php
    
    // Inclui menus superiores da pagina
    //include_once '..\functions/menu1.php';
    
    ?>     
                                 
                        <h3><?php //echo $comm['pgTitle']; ?></h3>

<div id="div_left">
    	<h3 class="blue_title">Team View</h3>
        
        <table id="db_list">
            <tr>            	
            <th>Name</th>
            <th>User</th>
            <th>Ext</th>
            <th>Register</th>
            <th>Badge</th>
            <th>Home phone</th>
            <th>Mobile phone</th>
            <th>E-mail</th>
            <th>Home adress</th>
            <th>Occupation</th>
            <th>Shift</th>
            <th colspan="2">Manage</th>
            </tr>
<?php

    require_once '..\functions/server.php';
                 
        $query="SELECT
                    id,
                    name,
                    last_name,
                    user_name,
                    phone_ext,
                    register,
                    badge,
                    home_phone,
                    molibe_phone,
                    email,
                    home_adress,                                
                    city,
                    occupation,
                    shift    
                FROM
                    `tbl_users`
                WHERE enabled=1 ORDER BY shift ASC";

        $result = check_data($query);
        
        $tbl="tbl_users";
        $col="id";
                                        
        for($j=1;$row=mysqli_fetch_array($result);$j++)
        {
            $color="";
            if($j%2==0){ $color="#dddddd"; }
            else{ $color="#ffffff"; }
            
            $get_info="tbl=" . $tbl . "&col=" . $col . "&val=" . $row['id'];

            echo "<tr style='background-color:" .  $color . ";'>                                            
                            <td>" . $row['name'] . " " . $row['last_name'] . "</td>
                            <td>" . $row['user_name'] . "</td>
                            <td>" . $row['phone_ext'] . "</td>
                            <td>" . $row['register'] . "</td>
                            <td>" . $row['badge'] . "</td>
                            <td>" . $row['home_phone'] . "</td>
                            <td>" . $row['molibe_phone'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['home_adress'] . ", " . $row['city'] . "</td>
                            <td>" . $row['occupation'] . "</td>
                            <td>" . $row['shift'] . "</td>
                            <td align='center'><a href='edit_product.php?id=" . $row['id'] . "' title='Edit " . $row['name'] . "'><img src='..\images\pencil.png' /></a></td>
                            <td align='center'><a href='..\\functions/delete.php?" . $get_info . "' title='Delete " . $row['name'] . "'><img src='..\images\delete.png' /></a></td>
                    </tr>";
        }
				
?>
            <tr>
            	<th colspan="11" align="left">
                	<?php 
						echo "Quantity: " . mysqli_num_rows($result);
					?>
                </th>
                <th colspan="2">
                	<?php echo "<a href='' title='Export list to Excel'><img src='..\images/excel.gif' /></a>"; ?>
                </th>
            </tr>
        </table>
        
</div>
<?php
    
    // Inclui rodapé da pagina
    include_once '..\functions/menu2.php';
    
    ?>
    
</body>
</html>