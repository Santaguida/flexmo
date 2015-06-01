<?php session_start(); ?>

<!-- 
    Developed by Fernando Henrique Santaguida and Gabriel Nazato
    			http://www.fernandohs.com.br
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
<?php

// Chama função que conecta o server
require_once '..\..\functions/server.php';

if(isset($_POST['product'])){
    $project = $_POST['product'];
    $line = $_POST['line'];    
    $station = $_POST['station'];
    $jigid = $_POST['jigid'];    
    $alert = '';

    if($project == "0"){
        $alert .= 'Informe o produto !';       
    }
    if($line == "0"){
        $alert .= 'Informe a linha !';       
    }
    if($station == "0"){
        $alert .= 'Informe a estação !';       
    }
    if(empty($jigid)){
        $alert .= 'Informe a ID da jiga !';       
    }
    if(empty($alert)){
        check_data("INSERT INTO `tbl_fct_setup`(`product`, `line`, `station`, `jigid`)
            VALUES ('$project', '$line','$station','$jigid')");
        
        $alert .= 'Salvo com sucesso !';
    }    
}

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

<!-- include menu1 start -->

<?php include_once '..\..\functions/menu1.php'; ?>

    <!-- include menu1 end -->       
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6">
                    <h3 class="widget-title">Setup de jiga</h3>
                     <?php
                            
                        // Caso exista um alerta, imprime na tela
                        // Caso não, mantem mensagem HTML
                        if(!empty($alert)){
                            print '</br>' . $alert;
                                }                            
                        else{
                            print 'Campo obrigatório*';
                            }                           
                            
                    ?>
                    
                    <div class="contact-form">
                      <form name="contactform" id="contactform" action="" method="post">
                            <p>
                                <select name="product" id="product" onChange="jsColorSwitch();">
                                <option value="0" <?php if(!isset($product)){ echo "selected"; } ?> style="color:#a9a9a9;" >Product [Produto]</option>
                                <?php
                                    //Query info for account <select>
                                    $query = "SELECT * FROM tbl_products WHERE enabled=1 ORDER BY product ASC";
                                    $result = check_data($query) or die("Error: " . mysqli_error($db_link));
                                    
                                    for($i=1; $query_product = mysqli_fetch_array($result); $i++)
                                    {
                                        //echo $query_product['id'];
                                        $selected = "";
                                        if(isset($product))
                                        {
                                            if($product==$query_product['id']){ $selected="selected"; }
                                        }
                                        echo "<option value='" . $query_product['id'] . "' " . $selected . " style='color:#000000 !important;' >" . $query_product['product'] . "</option>";
                                    }
                                ?>
                                </select>
                            </p>
                            <p>
                                <select name="line">
                                    <option value="0" <?php if(!isset($line)){ echo "selected"; } ?> style="color:#a9a9a9;" >Line [Linha]</option>
                                    <?php for($i = 1; $i <= 16; $i++): ?>
                                        <option value="<?php print $i . 'A'; ?>"><?php print $i . 'A'; ?></option>
                                        <option value="<?php print $i . 'B'; ?>"><?php print $i . 'B'; ?></option>
                                    <?php endfor ?>
            </select>
                            </p>
                            <p>
                                <select name="station">
                                    <option value="0" <?php if(!isset($station)){ echo "selected"; } ?> style="color:#a9a9a9;" >Station [Estação]</option>
                                    <?php for($i = 1; $i <= 50; $i++): ?>
                                        <option value="<?php print $i; ?>"><?php print $i; ?></option>
                                    <?php endfor ?>
            </select>
                            </p>
                                <input name="jigid" type="text" id="jigid" placeholder="ID da jiga" value="<?php if(isset($jigid) && $alert != 'Salvo com sucesso !') { echo $jigid; } ?>" required>
                            <p>
                              <input type="submit" class="mainBtn" id="submit" value="Salvar">
                            </p>                            
                      </form>
                    </div> <!-- /.contact-form -->
                </div>
                
            </div>
        </div>
	<!-- include menu2 start -->
    
<?php include_once '..\..\functions/menu2.php'; ?>   

	<!-- include menu2 end -->
    
</body>
</html>