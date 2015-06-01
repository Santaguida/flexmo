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
    
    <?php include_once '..\..\functions/header.php'; ?>   
        
	<!--
    include head end
    -->
    
	<title>FleXmo</title>

</head>

<body>

<!-- include menu1 start -->

<?php include_once '..\..\functions/menu1.php'; ?>

    <!-- include menu1 end -->
        
        
        <h3 class="blue_title">Setup</h3>
        <div id="list_us">
        <table id="db_list_us">
            
<?php

    require_once '..\..\functions/server.php';
                 
        $query="SELECT
                    s.id Id,
                    s.jigid Jigid,
                    s.station Station,
                    p.product Product
                FROM
                    `tbl_fct_setup` s
                JOIN
                    `tbl_products` p ON (s.product=p.id)
                WHERE 1";

        $result = check_data($query);
        
        $tbl="tbl_fct_setup";
        $col="id";
                                        
        for($j=1;$row=mysqli_fetch_array($result);$j++)
        {
            $color="";
            if($j%2==0){ $color="#dddddd"; }
            else{ $color="#ffffff"; }
            
            $get_info="tbl=" . $tbl . "&col=" . $col . "&val=" . $row['Id'];

            echo "<tr style='background-color:" .  $color . ";'>                                            
                            <td align='center'>
                            <a href='update.php?id=" . $row['Id'] . "' title='Edit " . $row['Product'] . "'>
                                <p>" . $row['Product'] . "</p>
                                <p>Station: " . $row['Station'] . "</p>
                                <p>" . $row['Jigid'] . "</p>
                            </a>
                            </td>
                    </tr>";
        }
				
?>
            
        </table>
       </div>    
	<!-- include menu2 start -->
    
<?php include_once '..\..\functions/menu2.php'; ?>   

	<!-- include menu2 end -->
    
</body>
</html>