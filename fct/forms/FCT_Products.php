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
    $jigaid = $_POST['jigaid'];    
    $numberJig = $_POST['numberJig'];    
    $alert = '';

    if(empty($project)){
        $alert .= 'Nome do produto invalido !';       
    }
    if(empty($jigaid)){
        $alert .= 'Jiga ID invalida !';       
    }
    if( preg_match( '/[0-9]/' , $jigaid ) ){
    $alert .= 'No campo Jiga ID, digite apenas letras !';

    }
    if(empty($alert)){
        check_data("INSERT INTO `tbl_fct_jigs`(`product`, `jigid`, `jigQnt`)
            VALUES ('$project', '$jigaid','$numberJig')");
        
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
                    <h3 class="widget-title">Cadastro de jigas</h3>
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
                                <input name="jigaid" type="text" id="jigaid" placeholder="Digite apenas as letras da Jiga ID" value="<?php if(isset($jigaid) && $alert != 'Salvo com sucesso !') { echo $jigaid; } ?>" required>
                            </p>
                            <p>
                              <label for="numberJig"></label>
                              <select name="numberJig" id="numberJig">
                                <option value="numJigas">Informe a quantidade de Jigas</option>
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                                <option value="5">05</option>
                                <option value="6">06</option>
                                <option value="7">07</option>
                                <option value="8">08</option>
                                <option value="9">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                                <option value="41">51</option>
                                <option value="42">52</option>
                                <option value="43">53</option>
                                <option value="44">54</option>
                                <option value="45">55</option>
                                <option value="46">56</option>
                                <option value="47">57</option>
                                <option value="48">58</option>
                                <option value="49">59</option>
                                <option value="50">60</option>
                              </select>
                            </p>
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