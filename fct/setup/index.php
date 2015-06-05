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
        
        
        <h3 align="center" class="widget-title">Setup</h3>
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
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[15] . "' title='Edit " . $jigid[15] . "'>Station: " . $station[15] . "</br>" . $product[15] . "</br>" . $jigid[15] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[14] . "' title='Edit " . $jigid[14] . "'>Station: " . $station[14] . "</br>" . $product[14] . "</br>" . $jigid[14] . "</a>"; ?></td>
      <td rowspan="7" align="center" valign="middle">&nbsp;</td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[1] . "' title='Edit " . $jigid[1] . "'>Station: " . $station[1] . "</br>" . $product[1] . "</br>" . $jigid[1] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[0] . "' title='Edit " . $jigid[0] . "'>Station: " . $station[0] . "</br>" . $product[0] . "</br>" . $jigid[0] . "</a>"; ?></td>
    </tr>
    <tr>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[17] . "' title='Edit " . $jigid[17] . "'>Station: " . $station[17] . "</br>" . $product[17] . "</br>" . $jigid[17] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[16] . "' title='Edit " . $jigid[16] . "'>Station: " . $station[16] . "</br>" . $product[16] . "</br>" . $jigid[16] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[3] . "' title='Edit " . $jigid[3] . "'>Station: " . $station[3] . "</br>" . $product[3] . "</br>" . $jigid[3] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[2] . "' title='Edit " . $jigid[2] . "'>Station: " . $station[2] . "</br>" . $product[2] . "</br>" . $jigid[2] . "</a>"; ?></td>
    </tr>
    <tr>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[19] . "' title='Edit " . $jigid[19] . "'>Station: " . $station[19] . "</br>" . $product[19] . "</br>" . $jigid[19] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[18] . "' title='Edit " . $jigid[18] . "'>Station: " . $station[18] . "</br>" . $product[18] . "</br>" . $jigid[18] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[5] . "' title='Edit " . $jigid[5] . "'>Station: " . $station[5] . "</br>" . $product[5] . "</br>" . $jigid[5] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[4] . "' title='Edit " . $jigid[4] . "'>Station: " . $station[4] . "</br>" . $product[4] . "</br>" . $jigid[4] . "</a>"; ?></td>
    </tr>
    <tr>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[21] . "' title='Edit " . $jigid[21] . "'>Station: " . $station[21] . "</br>" . $product[21] . "</br>" . $jigid[21] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[20] . "' title='Edit " . $jigid[20] . "'>Station: " . $station[20] . "</br>" . $product[20] . "</br>" . $jigid[20] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[7] . "' title='Edit " . $jigid[7] . "'>Station: " . $station[7] . "</br>" . $product[7] . "</br>" . $jigid[7] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[6] . "' title='Edit " . $jigid[6] . "'>Station: " . $station[6] . "</br>" . $product[6] . "</br>" . $jigid[6] . "</a>"; ?></td>
    </tr>
    <tr>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[23] . "' title='Edit " . $jigid[23] . "'>Station: " . $station[23] . "</br>" . $product[23] . "</br>" . $jigid[23] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[22] . "' title='Edit " . $jigid[22] . "'>Station: " . $station[22] . "</br>" . $product[22] . "</br>" . $jigid[22] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[9] . "' title='Edit " . $jigid[9] . "'>Station: " . $station[9] . "</br>" . $product[9] . "</br>" . $jigid[9] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[8] . "' title='Edit " . $jigid[8] . "'>Station: " . $station[8] . "</br>" . $product[8] . "</br>" . $jigid[8] . "</a>"; ?></td>
    </tr>
    <tr>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[25] . "' title='Edit " . $jigid[25] . "'>Station: " . $station[25] . "</br>" . $product[25] . "</br>" . $jigid[25] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[24] . "' title='Edit " . $jigid[24] . "'>Station: " . $station[24] . "</br>" . $product[24] . "</br>" . $jigid[24] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[11] . "' title='Edit " . $jigid[11] . "'>Station: " . $station[11] . "</br>" . $product[11] . "</br>" . $jigid[11] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[10] . "' title='Edit " . $jigid[10] . "'>Station: " . $station[10] . "</br>" . $product[10] . "</br>" . $jigid[10] . "</a>"; ?></td>
    </tr>
    <tr>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[27] . "' title='Edit " . $jigid[27] . "'>Station: " . $station[27] . "</br>" . $product[27] . "</br>" . $jigid[27] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[26] . "' title='Edit " . $jigid[26] . "'>Station: " . $station[26] . "</br>" . $product[26] . "</br>" . $jigid[26] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[13] . "' title='Edit " . $jigid[13] . "'>Station: " . $station[13] . "</br>" . $product[13] . "</br>" . $jigid[13] . "</a>"; ?></td>
      <td width="100" height="100" align="center" valign="middle"><?php echo "<a href='update.php?id=" . $id[12] . "' title='Edit " . $jigid[12] . "'>Station: " . $station[12] . "</br>" . $product[12] . "</br>" . $jigid[12] . "</a>"; ?></td>
    </tr>
  </table>
</form>
        
	<!-- include menu2 start -->
    
<?php include_once '..\..\functions/menu2.php'; ?>   

	<!-- include menu2 end -->
    
</body>
</html>