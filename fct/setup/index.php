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
                 
    $result = check_data("SELECT
                            s.id Id,
                            s.jigid Jigid,
                            s.station Station,
                            p.product Product
                        FROM
                            `tbl_fct_setup` s
                        JOIN
                            `tbl_products` p ON (s.product=p.id)
                        WHERE 1");

        
    for($j=1;$row=mysqli_fetch_array($result);$j++)
    {
    
    $id[] = $row['Id'];
    $product[] = $row['Product'];
    $station[] = $row['Station'];
    $jigid[] = $row['Jigid'];
    
    }    
       
?>
            
        </table>
       </div>
        
<form id="form1" name="form1" method="post" action="">
  <table width="425" border="1" align="center">
    <tr>   
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[1] . "' title='Edit " . $jigid[1] . "'>Station: " . $station[1] . "</br>" . $product[1] . "</br>" . $jigid[1] . "</a>"; ?></td>
      <td rowspan="7" align="center" valign="middle">&nbsp;</td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
    </tr>
    <tr>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[2] . "' title='Edit " . $jigid[2] . "'>Station: " . $station[2] . "</br>" . $product[2] . "</br>" . $jigid[2] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[3] . "' title='Edit " . $jigid[3] . "'>Station: " . $station[3] . "</br>" . $product[3] . "</br>" . $jigid[3] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
    </tr>
    <tr>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[1] . "' title='Edit " . $jigid[1] . "'>Station: " . $station[1] . "</br>" . $product[1] . "</br>" . $jigid[1] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
    </tr>
    <tr>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
    </tr>
    <tr>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
    </tr>
    <tr>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
    </tr>
    <tr>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
    </tr>
  </table>
</form>
        
	<!-- include menu2 start -->
    
<?php include_once '..\..\functions/menu2.php'; ?>   

	<!-- include menu2 end -->
    
</body>
</html>