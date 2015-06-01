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
                                        
        $row=mysqli_fetch_array($result);        
				
?>
            
        </table>
       </div>
        
    <form id="form1" name="form1" method="post" action="">
  <table width="425" border="1">
    <tr>
      <td width="100" height="100"><?php echo "<p>$row[Product]</p><p>WS: $row[Station]</p><p>$row[Jigid]</p>"; ?></td>
      <td width="100" height="100"><?php echo "<p>$row[Product]</p><p>WS: $row[Station]</p><p>$row[Jigid]</p>"; ?></td>
      <td rowspan="7">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
    </tr>
    <tr>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
    </tr>
    <tr>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
    </tr>
    <tr>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
    </tr>
    <tr>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
    </tr>
    <tr>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
    </tr>
    <tr>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
      <td width="100" height="100">&nbsp;</td>
    </tr>
  </table>
</form>
        
	<!-- include menu2 start -->
    
<?php include_once '..\..\functions/menu2.php'; ?>   

	<!-- include menu2 end -->
    
</body>
</html>