<!-- 
    Developed by Fernando Henrique Santaguida and Gabriel Nazato
    			http://www.fernandohs.com.br
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
<?php

// Chama função que conecta o server
require_once '..\..\functions/server.php';

?>
    
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
    
<?php
	
	
	$alert="";
	
	/*In case there's no GET info
	if(!isset($_GET['id']) && !isset($_POST['id']))
	{
		die("Error: GET or POST info not set! <br><br><a href='javascript:history.go(-1)' title='Go back to last page'>Back</a>");
	}*/
	
	//In case there is POST info
	if(isset($_POST['id']))
	{	
		//Check if the jig is due
		$sql="SELECT id FROM tbl_fct_setup WHERE jigid='" . $_POST['jigid'] . "' AND product='" . $_POST['product'] . "'";
		$result = check_data($sql) or die("Error: " . mysqli_error($db_link));
		if(mysqli_num_rows($result)>=1)
		{
			$alert = "Possivel duplicidade";
			$jig_id = $_POST['id'];
		}
		else
		{		
                    
                        //Mount sql string
			$sql = "UPDATE tbl_fct_setup SET product='" . $_POST['product'] . "', jigid='" . $_POST['jigid'] . "' WHERE id=" . $_POST['id'];
			
			//Execute query
			check_data($sql) or die("Error: " . mysqli_error($db_link));
			
			//Go back to setup page
			header('Location: index.php');
                        
                        echo 'teste';
		}		
	}
	/*else
	{
		$jig_id = $_GET['id'];
	}
		
	//Mount sql string
	$sql = "SELECT
                    s.id Id,
                    s.jigid Jigid,
                    s.station Station,
                    p.product Product
                FROM
                    `tbl_fct_setup` s
                JOIN
                    `tbl_products` p ON (s.product=p.id)
                WHERE s.id=" . $jig_id;
			
	//Execute query
	$result = check_data($sql) or die("Erro: " . mysqli_error($db_link));
	
	$row = mysqli_fetch_array($result);
	
    $id = $row['Id'];
    $product = $row['Product'];
    $station = $row['Station'];
    $jig_id = $row['Jigid'];
    */
    
?>

<!-- include menu1 start -->

<?php include_once '..\..\functions/menu1.php'; ?>

    <!-- include menu1 end -->


<link rel="stylesheet" type="text/css" href="../css/style.css">

<div id="div_center">    
<h3 align="center" class="widget-title">Ticket Opening</h3>
    <form name="setup_edit" action="" method="post">
        <input name="id" type="hidden" value=" <?php echo $id; ?> "/>           
        <p>
            <table cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td width="100%">
                        <select name="product" id="product" onChange="jsColorSwitch();">
                            <?php
                                //Query info for product <select>
                                $query = "SELECT * FROM tbl_products WHERE enabled=1 ORDER BY account ASC";
                                $result = check_data($query) or die("Erro: " . mysqli_error($db_link));
                                                    
                                for($i=1; $query_product = mysqli_fetch_array($result); $i++)
                                {
                                    //echo $query_station['id'];
                                    $selected = "";
                                    if($product==$query_product['product']){ $selected="selected"; }
									
                                    echo "<option value='" . $query_product['id'] . "' " . $selected . " style='color:#000000 !important;' >" . $query_product['product'] . "</option>";
                                }					
                            ?>
                        </select>
                    </td>                    
                </tr>
            </table>           
        </p>
        <p>
            <table cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td width="100%">
                        <select name="station" id="station" onChange="jsColorSwitch();">
                            <?php
                                //Query info for product <select>
                                $query = "SELECT * FROM tbl_fct_setup WHERE 1";
                                $result = check_data($query) or die("Erro: " . mysqli_error($db_link));
                                                    
                                for($i=1; $query_station = mysqli_fetch_array($result); $i++)
                                {
                                    //echo $query_station['id'];
                                    $selected = "";
                                    if($station==$query_station['station']){ $selected="selected"; }
									
                                    echo "<option value='" . $query_station['id'] . "' " . $selected . " style='color:#000000 !important;' >" . $query_station['station'] . "</option>";
                                }					
                            ?>
                        </select>
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
            <input type="submit" class="button_blue" id="submit" value="OPEN">
        </p>
        
    </form>
</div>
    <!-- include menu2 start -->
    
<?php include_once '..\..\functions/menu2.php'; ?>   

	<!-- include menu2 end -->
    
</body>
</html>