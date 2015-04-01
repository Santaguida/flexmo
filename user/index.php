<?php session_start();

// Define language
$page = $_SERVER['PHP_SELF'];

        if (isset($_SESSION["language"])){
            if ($_SESSION["language"]=="portuguese"){
                $language = "portuguese";
                include_once 'ptbr.inc.php';
            }elseif ($_SESSION["language"]== "english") {
                $language = "english";
                include_once 'eng.inc.php';
            }
        }
        else {            
            include_once 'eng.inc.php';
        }

// Chama função Codifica senha
require_once '..\functions/encodesPassword.inc.php';
require_once '..\functions/checkLogin.inc.php';

// Se o nome for setado, variaveis recebem posts
if(isset($_POST['name'])){
    $name = $_POST['name'];    
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
    define('MSG', $comm['completed']);
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
        $alert .= $comm['fieldError'] . $comm['name'] . '<br/>';       
    }
    if(strlen($name)<=2){
        $alert .= $comm['fieldError'] . $comm['name2'] . '<br/>';
    }     
    if(empty($lastName)){
        $alert .= $comm['fieldError'] . $comm['lastName'] . '<br/>';
    }
    if(strlen($lastName)<=2){
        $alert .= $comm['fieldError'] . $comm['lastName2'].'<br/>';
    }
    if(empty($user)){
        $alert .= $comm['fieldError'] . $comm['user'].'<br/>';       
    }
    elseif(check_login($user)){
        $alert .= $comm['login'].'<br/>';        
    }
    if(substr($user, 0, 3) != 'sao' || substr($name, 0, 1) != substr($user, 3, 1)){
        $alert .= $comm['user2'].'<br/>';        
    }
    if(!empty($extension)){
        if(!is_numeric($extension)){
        $alert .= $comm['fieldError'] . $comm['ext'].'<br/>';
        }
        if(strlen($extension)!=4){
        $alert .= $comm['fieldError'] . $comm['ext2'].'<br/>';
        }
    }
    if(empty($register)){
        $alert .= $comm['fieldError'] . $comm['register'].'<br/>';
    }
    if(!is_numeric($register)){
        $alert .= $comm['fieldError'] . $comm['register2'].'<br/>';
    }
    if(strlen($register)>=7){
        $alert .= $comm['fieldError'] . $comm['register3'].'<br/>';
    }
    if(!empty($badge)){
        if(!is_numeric($badge)){
        $alert .= $comm['fieldError'] . $comm['badge'].'<br/>';
        }
        if(strlen($badge) >= 7){
        $alert .= $comm['fieldError'] . $comm['badge2'].'<br/>';
        }
    }
    if(empty($phone)){
        $alert .= $comm['fieldError'] . $comm['phone'].'<br/>';
    }
    if(!is_numeric($phone)){
        $alert .= $comm['fieldError'] . $comm['phone2'].'<br/>';
    }
    if(strlen($phone) != 10){
        $alert .= $comm['fieldError'] . $comm['phone3'].'<br/>';
    }
    if(empty($cell)){
        $alert .= $comm['fieldError'] . $comm['cell'].'<br/>';
    }
    if(!is_numeric($cell)){
        $alert .= $comm['fieldError'] . $comm['cell2'].'<br/>';
    }
    if(strlen($cell) != 11){
        $alert .= $comm['fieldError'] . $comm['cell3'].'<br/>';
    }
    if(empty($email)){
        $alert .= $comm['fieldError'] . $comm['email'].'<br/>';
    }
    if ($email != $checkEmail) {
        $alert .= $comm['email2'].'<br/>';
    }  
    if(empty($adress)){
        $alert .= $comm['fieldError'] . $comm['adress'].'<br/>';
    }
    if(empty($neigh)){
        $alert .= $comm['fieldError'] . $comm['neigh'].'<br/>';
    }
    if(empty($city)){
        $alert .= $comm['fieldError'] . $comm['city'].'<br/>';
    }
    if(empty($password)){
        $alert .= $comm['fieldError'] . $comm['pass'].'<br/>';
    }
    if(strlen($password) <= 5 ){
        $alert .= $comm['fieldError'] . $comm['pass2'].'<br/>';
    }
    if ($password != $checkPassword) {
        $alert .= $comm['fieldError'] . $comm['pass3'].'<br/>';
    }    
    if ($occupation == 'informe') {
        $alert .= $comm['fieldError'] . $comm['func'].'<br/>';
    }
    if ($shift == 'informe') {
        $alert .= $comm['fieldError'] . $comm['shift'].'<br/>';
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
        $alert .= MSG;        
        
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $comm['pgTitle']; ?></title>

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
                        
                        <h3 class="widget-title"><?php echo $comm['pgTitle']; ?></h3>
                        <h5 class="text-danger">
                        
                            <?php
                            
                            // Caso exista um alerta, imprime na tela
                            // Caso não, mantem mensagem HTML
                            if(!empty($alert)){
                                print '</br>' . $alert;
                                    }                            
                            else{
                                print $comm['alerted'];
                                }
                                
                            ?>
                        
                        </h5>    
                        <div class="contact-form">
                            <form name="contactform" id="contactform" action="" method="post">
                                <p>
                                    <input name="name" type="text" id="name" value="<?php if (isset($name) && $alert != MSG) { echo $name; } ?>" placeholder="<?php echo $comm['name']; ?>" autofocus required>                                       
                                </p>
                                <p>
                                    <input name="lastName" type="text" id="lastName" value="<?php if (isset($lastName) && $alert != MSG) { echo $lastName; } ?>" placeholder="<?php echo $comm['lastName']; ?>" required>
                                </p>
                                <p>
                                    <input name="user" type="text" id="user" value="<?php if (isset($user) && $alert != MSG) { echo $user; } ?>" placeholder="<?php echo $comm['user']; ?>" required>
                                </p>
                                <p>
                                    <input name="extension" type="text" id="extension" value="<?php if (isset($extension) && $alert != MSG) { echo $extension; } ?>" placeholder="<?php echo $comm['ext']; ?>" >
                                </p>
                                <p>
                                    <input name="register" type="text" id="register" value="<?php if (isset($register) && $alert != MSG) { echo $register; } ?>" placeholder="<?php echo $comm['register']; ?>" required>
                                </p>
                                <p>
                                    <input name="badge" type="text" id="badge" value="<?php if (isset($badge) && $alert != MSG) { echo $badge; } ?>" placeholder="<?php echo $comm['badge']; ?>">
                                </p>
                                <p>
                                    <input name="phone" type="text" id="phone" value="<?php if (isset($phone) && $alert != MSG) { echo $phone; } ?>" placeholder="<?php echo $comm['phone']; ?>" required>
                                </p>
                                <p>
                                    <input name="cell" type="text" id="cell" value="<?php if (isset($cell) && $alert != MSG) { echo $cell; } ?>" placeholder="<?php echo $comm['cell']; ?>" required>
                                </p>
                                <p>
                                    <input name="email" type="email" id="email" value="<?php if (isset($email) && $alert != MSG) { echo $email; } ?>" placeholder="<?php echo $comm['email']; ?>" required> 
                                </p>
                                <p>
                                    <input name="checkEmail" type="email" id="checkEmail" value="<?php if (isset($checkEmail) && $checkEmail == $email && $alert != MSG) { echo $checkEmail; } ?>" placeholder="<?php echo $comm['email2']; ?>" required> 
                                </p>
                                <p>
                                    <input name="adress" type="text" id="adress" value="<?php if (isset($adress) && $alert != MSG) { echo $adress; } ?>" placeholder="<?php echo $comm['adress']; ?>" required>
                                </p>
                                <p>
                                    <input name="neigh" type="text" id="neigh" value="<?php if (isset($neigh) && $alert != MSG) { echo $neigh; } ?>" placeholder="<?php echo $comm['neigh']; ?>" required>
                                </p>
                                <p>
                                    <input name="city" type="text" id="city" value="<?php if (isset($city) && $alert != MSG) { echo $city; } ?>" placeholder="<?php echo $comm['city']; ?>" required>
                                </p>
                                <p>
                                    <input name="password" type="password" id="password"  placeholder="<?php echo $comm['pass']; ?>" required> 
                                </p>
                                <p>
                                    <input name="checkPassword" type="password" id="checkPassword" placeholder="<?php echo $comm['pass3']; ?>" required> 
                                </p>
                                <p>
                                    <select name="occupation" id="occupation" >
                                        <option value="informe" <?php if (isset($occupation) == '') { echo 'selected'; } ?> ><?php echo $comm['func']; ?></option>
                                        <option value="Manager" <?php if (isset($occupation) && $occupation == 'Manager' && $alert != MSG) { echo 'selected'; } ?> ><?php echo $comm['manager']; ?></option>
                                        <option value="Technical coordinator" <?php if (isset($occupation) && $occupation == 'Technical coordinator' && $alert != MSG) { echo 'selected'; } ?> ><?php echo $comm['tecCoo']; ?></option>
                                        <option value="Production coordinator" <?php if (isset($occupation) && $occupation == 'Production coordinator' && $alert != MSG) { echo 'selected'; } ?> ><?php echo $comm['prodCoo']; ?></option>
                                        <option value="Engineer" <?php if (isset($occupation) && $occupation == 'Engineer' && $alert != MSG) { echo 'selected'; } ?> ><?php echo $comm['engineer']; ?></option>
                                        <option value="Technician" <?php if (isset($occupation) && $occupation == 'Technician' && $alert != MSG) { echo 'selected'; } ?> ><?php echo $comm['tech']; ?></option>
                                        <option value="Quick Repair" <?php if (isset($occupation) && $occupation == 'Quick Repair' && $alert != MSG) { echo 'selected'; } ?> ><?php echo $comm['quick']; ?></option>
                                    </select>
                                    <select name="shift" id="shift" >
                                        <option value="informe" <?php if (isset($shift) == '') { echo 'selected'; } ?> ><?php echo $comm['shift']; ?></option>
                                        <option value="1st" <?php if (isset($shift) && $shift == '1st' && $alert != MSG) { echo 'selected'; } ?> ><?php echo $comm['s1']; ?></option> 
                                        <option value="2sd" <?php if (isset($shift) && $shift == '2sd' && $alert != MSG) { echo 'selected'; } ?> ><?php echo $comm['s2']; ?></option>
                                        <option value="3th" <?php if (isset($shift) && $shift == '3th' && $alert != MSG) { echo 'selected'; } ?> ><?php echo $comm['s3']; ?></option>
                                        <option value="ADM" <?php if (isset($shift) && $shift == 'ADM' && $alert != MSG) { echo 'selected'; } ?> ><?php echo $comm['s4']; ?></option>                            
                                    </select>
                                <p/>                                	
                                <p>
                                    <input type="submit" class="mainBtn" id="submit" value="<?php echo $comm['save']; ?>" >
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