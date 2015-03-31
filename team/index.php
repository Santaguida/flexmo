
<div id="div_left">
    	<h3 class="blue_title">Team View</h3>
        
        <table id="db_list">
        	<tr>            	
                <th>Name</th>
                <th>User Name</th>
                <th>Extension</th>
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
                            WHERE 1";

                    $result = check_data($query);
                    for($j=1;$row=mysqli_fetch_array($result);$j++)
                    {
                            $color="";
                            if($j%2==0){ $color="#dddddd"; }
                            else{ $color="#ffffff"; }

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
                                            <td align='center'><a href='products.php?func=edit' title='Edit Entry'><img src='..\images\pencil.png' /></a></td>
                                            <td align='center'><a href='' title='Delete Entry'><img src='..\images\delete.png' /></a></td>
                                      </tr>";
                    }
				
				?>
        </table>
        
    </div> <!-- div_left -->
