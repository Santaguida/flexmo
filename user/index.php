<?php

// Chama função Codifica senha
require_once '..\functions/encodesPassword.inc.php';

// Se o nome for setado, variaveis recebem posts
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $nameErr = '';    
    $lastName = $_POST['lastName'];
    $user = $_POST['user'];
    $extension = $_POST['extension'];
    $register = $_POST['register'];
    $badge = $_POST['badge'];
    $phone = $_POST['phone'];
    $cell = $_POST['cell'];
    $email = $_POST['email'];
    $checkEmail = $_POST['checkEmail'];
    $adress = $_POST['adress'];
    $neigh = $_POST['neigh'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    $checkPassword = $_POST['checkPassword'];
    $occupation = $_POST['occupation'];
    $shift = $_POST['shift'];
    $alert = '';
    //Define MSG como constante e recebe a mensagem a frente
    define('MSG', 'Informações salvas com sucesso !<br />');
    /**
     * Excluida
     * Função para criar userName
     * @param type $name Description
     * @param return $userName Description
        
    $userName .= substr($name, 0, 1);
    $userName .= substr($lastName, 0, 4);
    $userName = strtolower($userName);
    */ 
    
    // Chama função que Trata dados
    include_once '..\functions/testInput.inc.php';
    
    $name = test_input($_POST["name"]);
    $lastName = test_input($_POST["lastName"]);
    
    
    // Chama função que conecta o server
    require_once '..\functions/server.php';
    
    // Validação de formulários
    if(empty($name)){
        $alert .= 'Por favor, preencha o campo NOME corretamente.<br />';       
    }
    if(strlen($name)<=2){
        $alert .= 'Por favor, preencha o campo NOME com no mínimo 3 caracteres.<br />';
    }
    if(empty($user)){
        $alert .= 'Por favor, preencha o campo USER corretamente.<br />';       
    }
    if(substr($user, 0, 3) != 'sao' || substr($name, 0, 1) != substr($user, 3, 1)){
        $alert .= 'Por favor, preencha o campo USER como o exemplo: saoNXXXX,'
                . '<br/>onde \'sao\' é obrigatório no inínio, \'N\' é o'
                . '<br/>primeiro caracter do seu nome e \'XXXX\' são os quatro'
                . '<br/>primeiros digitos do seu sobrenome<br />';        
    }
    if(empty($lastName)){
        $alert .= 'Por favor, preencha o campo SOBRENOME corretamente<br />';
    }
    if(strlen($lastName)<=2){
        $alert .= 'Por favor, preencha o campo SOBRENOME com no mínimo 3 caracteres.<br />';
    }
    if(!empty($extension)){
        if(!is_numeric($extension)){
        $alert .= 'Por favor, preencha o campo RAMAL apenas com números<br />';
        }
        if(strlen($extension)!=4){
        $alert .= 'Por favor, preencha o campo RAMAL com 4 dígitos.<br />';
        }
    }
    if(empty($register)){
        $alert .= 'Por favor, preencha o campo MATRÍCULA corretamente<br />';
    }
    if(!is_numeric($register)){
        $alert .= 'Por favor, preencha o campo MATRÍCULA apenas com números<br />';
    }
    if(strlen($register)>=7){
        $alert .= 'Por favor, preencha o campo MATRÍCULA com no máximo 6 dígitos.<br />';
    }
    if(!empty($badge)){
        if(!is_numeric($badge)){
        $alert .= 'Por favor, preencha o campo BADGE apenas com números<br />';
        }
        if(strlen($badge) >= 7){
        $alert .= 'Por favor, preencha o campo BADGE com no máximo 6 dígitos.<br />';
        }
    }
    if(empty($phone)){
        $alert .= 'Por favor, preencha o campo TELEFONE corretamente<br />';
    }
    if(!is_numeric($phone)){
        $alert .= 'Por favor, preencha o campo TELEFONE apenas com números e sem espaço.<br />';
    }
    if(strlen($phone) != 10){
        $alert .= 'Por favor, preencha o campo TELEFONE com 10 dígitos. Ex: DDXXXXYYYY<br />';
    }
    if(empty($cell)){
        $alert .= 'Por favor, preencha o campo CELULAR corretamente<br />';
    }
    if(!is_numeric($cell)){
        $alert .= 'Por favor, preencha o campo CELULAR apenas com números e sem espaço.<br />';
    }
    if(strlen($cell) != 11){
        $alert .= 'Por favor, preencha o campo CELULAR com 11 dígitos. Ex: DD9XXXXYYYY<br />';
    }
    if(empty($email)){
        $alert .= 'Por favor, preencha o campo E-MAIL corretamente<br />';
    }
    if ($email != $checkEmail) {
        $alert .= 'O e-mail não foi confirmado corretamente<br />';
    }  
    if(empty($adress)){
        $alert .= 'Por favor, preencha o campo ENDEREÇO corretamente<br />';
    }
    if(empty($neigh)){
        $alert .= 'Por favor, preencha o campo BAIRRO corretamente<br />';
    }
    if(empty($city)){
        $alert .= 'Por favor, preencha o campo CIDADE corretamente<br />';
    }
    if(empty($password)){
        $alert .= 'Por favor, preencha o campo SENHA<br />';
    }
    if(strlen($password) <= 5 ){
        $alert .= 'Por favor, preencha o campo SENHA com no mínimo 6 caracteres.<br />';
    }
    if ($password != $checkPassword) {
        $alert .= 'A senha não foi confirmada corretamente';
    }    
    if ($occupation == 'informe') {
        $alert .= 'Por favor, preencha o campo FUNÇÃO<br />';
    }
    if ($shift == 'informe') {
        $alert .= 'Por favor, preencha o campo TURNO<br />';
    }
    if(empty($alert)){      
        
        // Primeiro caracter maiusculo
        $name = ucfirst($name);
        $lastName = ucfirst($lastName);
        
        // Recebe senha codificada
        $encryptedPassword = encodes_password($password);
        
        // Insere as informações no banco de dados
        check_data("INSERT INTO `tbl_users`(`name`, `last_name`, `user_name`, `phone_ext`, `register`, `badge`, `home_phone`, `molibe_phone`, `e-mail`, `home_adress`, `neighborhood`, `city`, `password`, `occupation`, `shift`,`enabled`)
            VALUES ('$name', '$lastName','$user','$extension','$register','$badge','$phone','$cell','$email','$adress','$neigh','$city','$encryptedPassword', '$occupation','$shift','1')");
        
        // Confirma operação com mensagem
        $alert .= 'Informações salvas com sucesso !<br />';        
        
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User registration</title>

    <?php
    
    // Inclui cabeçario
    include_once '..\functions/header.php';
    
    ?>

</head>
<body> 
    
    <?php
    
    // Inclui menus superiores da pagina
    include_once '..\functions/menu1.php';
    
    ?>
    
        <div class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <h3 class="widget-title">Sign Up [Cadastro de usuário]</h3>
                        <h5 class="text-danger">
                        
                            <?php
                            
                            // Caso exista um alerta, imprime na tela
                            // Caso não, mantem mensagem HTML
                            if(!empty($alert)){
                                print '</br>' . $alert;
                                    }                            
                            else{
                                print '</br>*Required field';
                                }
                                
                            ?>
                            
                        </h5>    
                        <div class="contact-form">
                            <form name="contactform" id="contactform" action="" method="post">
                                <p>
                                    <input name="name" type="text" id="name" value="<?php if (isset($name) && $alert != MSG) { echo $name; } ?>" placeholder="*Your first name [Seu Nome]" autofocus required>                                       
                                </p>
                                <p>
                                    <input name="lastName" type="text" id="lastName" value="<?php if (isset($lastName) && $alert != MSG) { echo $lastName; } ?>" placeholder="*Last name [Sobrenome]" required>
                                </p>
                                <p>
                                    <input name="user" type="text" id="user" value="<?php if (isset($user) && $alert != MSG) { echo $user; } ?>" placeholder="*User name [Nome de usuário]" required>
                                </p>
                                <p>
                                    <input name="extension" type="text" id="extension" value="<?php if (isset($extension) && $alert != MSG) { echo $extension; } ?>" placeholder="Company extension phone [Ramal]" >
                                </p>
                                <p>
                                    <input name="register" type="text" id="register" value="<?php if (isset($register) && $alert != MSG) { echo $register; } ?>" placeholder="*Your register number [Matrícula]" required>
                                </p>
                                <p>
                                    <input name="badge" type="text" id="badge" value="<?php if (isset($badge) && $alert != MSG) { echo $badge; } ?>" placeholder="Badge number [Número do cracha]">
                                </p>
                                <p>
                                    <input name="phone" type="text" id="phone" value="<?php if (isset($phone) && $alert != MSG) { echo $phone; } ?>" placeholder="*Home phone - Only numbers [Telefone residencial - Apenas números]" required>
                                </p>
                                <p>
                                    <input name="cell" type="text" id="cell" value="<?php if (isset($cell) && $alert != MSG) { echo $cell; } ?>" placeholder="*Cellphone - Only numbers [Celular - Apenas números]" required>
                                </p>
                                <p>
                                    <input name="email" type="email" id="email" value="<?php if (isset($email) && $alert != MSG) { echo $email; } ?>" placeholder="*E-mail (Preference @flextronics.com)" required> 
                                </p>
                                <p>
                                    <input name="checkEmail" type="email" id="checkEmail" value="<?php if (isset($checkEmail) && $checkEmail == $email && $alert != MSG) { echo $checkEmail; } ?>" placeholder="*Check e-mail[Confirme seu e-mail]" required> 
                                </p>
                                <p>
                                    <input name="adress" type="text" id="adress" value="<?php if (isset($adress) && $alert != MSG) { echo $adress; } ?>" placeholder="*Adress and number [Endereço com número]" required>
                                </p>
                                <p>
                                    <input name="neigh" type="text" id="neigh" value="<?php if (isset($neigh) && $alert != MSG) { echo $neigh; } ?>" placeholder="*Neighborhood [Bairro]" required>
                                </p>
                                <p>
                                    <input name="city" type="text" id="city" value="<?php if (isset($city) && $alert != MSG) { echo $city; } ?>" placeholder="*City/State [Cidade / Estado]" required>
                                </p>
                                <p>
                                    <input name="password" type="password" id="password"  placeholder="*Password (As low 6 caracters)[Senha (Mínimo de 6 caracteres)]" required> 
                                </p>
                                <p>
                                    <input name="checkPassword" type="password" id="checkPassword" placeholder="*Check password[Confirme a senha]" required> 
                                </p>
                                <p>
                                    <select name="occupation" id="occupation" >
                                        <option value="informe" <?php if (isset($occupation) == '') { echo 'selected'; } ?> >*Enter your function [Informe sua função]</option>
                                        <option value="supervisor" <?php if (isset($occupation) && $occupation == 'supervisor' && $alert != MSG) { echo 'selected'; } ?> >Manager [Supervisor]</option>
                                        <option value="coordenadorTecnico" <?php if (isset($occupation) && $occupation == 'coordenadorTecnico' && $alert != MSG) { echo 'selected'; } ?> >Technical coordinator [Coordenador técnico]</option>
                                        <option value="coordenadorProducao" <?php if (isset($occupation) && $occupation == 'coordenadorProducao' && $alert != MSG) { echo 'selected'; } ?> >Production coordinator [Coordenador de produção]</option>
                                        <option value="engenheiro" <?php if (isset($occupation) && $occupation == 'engenheiro' && $alert != MSG) { echo 'selected'; } ?> >Engineer [Engenheiro]</option>
                                        <option value="tecnico" <?php if (isset($occupation) && $occupation == 'tecnico' && $alert != MSG) { echo 'selected'; } ?> >Technician [Técnico]</option>
                                        <option value="quickrepair" <?php if (isset($occupation) && $occupation == 'quickrepair' && $alert != MSG) { echo 'selected'; } ?> >Quick Repair</option>
                                    </select>
                                    <select name="shift" id="shift" >
                                        <option value="informe" <?php if (isset($shift) == '') { echo 'selected'; } ?> >*Enter your shift [Informe seu turno]</option>
                                        <option value="1" <?php if (isset($shift) && $shift == '1' && $alert != MSG) { echo 'selected'; } ?> >1T</option>
                                        <option value="2" <?php if (isset($shift) && $shift == '2' && $alert != MSG) { echo 'selected'; } ?> >2T</option>
                                        <option value="3" <?php if (isset($shift) && $shift == '3' && $alert != MSG) { echo 'selected'; } ?> >3T</option>
                                        <option value="4" <?php if (isset($shift) && $shift == '4' && $alert != MSG) { echo 'selected'; } ?> >ADM</option>                            
                                    </select>
                                <p/>                                	
                                <p>
                                    <input type="submit" class="mainBtn" id="submit" value="SALVAR" >
                                </p>                            
                            </form>
                        </div>
                    </div>                
                </div>
            </div>
</div>
    
    <?php
    
    // Inclui rodapé da pagina
    include_once '..\functions/menu2.php';
    
    ?> 
    
</body>
</html>