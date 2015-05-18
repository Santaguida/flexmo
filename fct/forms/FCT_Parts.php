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
    $code = $_POST['code'];    
    $descr = $_POST['descr'];    
    $alert = '';

    if(empty($project)){
        $alert .= 'Nome do produto invalido !';       
    }
    if(empty($code)){
        $alert .= 'codigo invalido !';       
    }
    if(empty($descr)){
        $alert .= 'Descrição invalida !';       
    }    
    if(empty($alert)){
        check_data("INSERT INTO `tbl_fct_parts`(`product`, `code`, `descr`)
            VALUES ('$project', '$code','$descr')");
        
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
                    <h3 class="widget-title">Cadastro de peças</h3>
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
                                <input name="code" type="text" id="code" placeholder="Código da peça" value="<?php if(isset($code) && $alert != 'Salvo com sucesso !') { echo $code; } ?>" required>
                            </p>
                                <input name="descr" type="text" id="descr" placeholder="Descrição da peça" value="<?php if(isset($descr) && $alert != 'Salvo com sucesso !') { echo $descr; } ?>" required>
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
</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

