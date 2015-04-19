<?php session_start(); ?>

<!-- 
    Developed by Fernando Henrique Santaguida and Gabriel Nazato
    			http://www.fernandohs.com.br
-->    

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <!--
    include head start
    -->
    
    <?php include_once '..\functions/header.php'; ?>   
        
	<!--
    include head end
    -->
    
	<title>FleXmo</title>

</head>

<body>

<!-- include menu1 start -->

<?php include_once '..\functions/menu1.php'; ?>

    <!-- include menu1 end -->
        
        
        <h3 class="blue_title">Team View</h3>
        <div id="list_us">
        <table id="db_list_us">
            <tr>            	
            <th>Name</th>            
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
                    phone_ext,
                    register,
                    badge,
                    home_phone,
                    mobile_phone,
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
                            <td>" . $row['phone_ext'] . "</td>
                            <td>" . $row['register'] . "</td>
                            <td>" . $row['badge'] . "</td>
                            <td>" . $row['home_phone'] . "</td>
                            <td>" . $row['mobile_phone'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['home_adress'] . ", " . $row['city'] . "</td>
                            <td>" . $row['occupation'] . "</td>
                            <td>" . $row['shift'] . "</td>
                            <td align='center'><a href='..\\user/index.php?id=" . $row['id'] . "' title='Edit " . $row['name'] . "'><img src='..\images\pencil.png' /></a></td>
                            <td align='center'><a href='..\\functions/delete.php?" . $get_info . "' title='Delete " . $row['name'] . "'><img src='..\images\delete.png' /></a></td>
                    </tr>";
        }
				
?>
            <tr>
            	<th colspan="10" >
                	<?php 
						echo "Quantity: " . mysqli_num_rows($result);
					?>
                </th>
                <th colspan="2" align="center">
                	<?php
                            //Sets the query to be exported to excel
                            $query="SELECT * FROM `tbl_users` WHERE enabled=1";

                            $query = str_replace("=","%3D",$query); //Encode reserved chars to avoid URL errors
                            $query = str_replace(" ","%20",$query); //Encode reserved chars to avoid URL errors

                            //Define the header for each column and mount the string
                            $headings_array = array('ID','Name','Last Name',
                                'User name','Extension','Register','Badge',
                                'Home phone', 'Mobile phone', 'E-mail','Adress',
                                'Hood', 'City', 'Password', 'Occupation', 'Shift',
                                'Level access', 'Enable'
                                );
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
                            $sheetname = "User List";
                            $sheetname = str_replace(" ","%20",$sheetname); //Encode reserved chars to avoid URL errors

                            //Define the file name
                            $filetype = "UserList"; //file name --> goes between 'flexmo' and 'datetime'
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
       </div>    
	<!-- include menu2 start -->
    
<?php include_once '..\functions/menu2.php'; ?>   

	<!-- include menu2 end -->
    
</body>
</html>