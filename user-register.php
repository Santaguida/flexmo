<?php

require_once 'functions/encodesPassword.inc.php';

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $userName = 'sao';
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
    /**
     * Função para criar userName
     * @param type $name Description
     * @param return $userName Description
     */    
    $userName .= substr($name, 0, 1);
    $userName .= substr($lastName, 0, 4);
    $userName = strtolower($userName);
      
    require_once 'server.php';
    
    if(empty($name)){
        $alert .= 'Por favor, preencha o campo NOME<br />';
    }
    elseif(empty($lastName)){
        $alert .= 'Por favor, preencha o campo SOBRENOME<br />';
    }
    elseif(empty($register)){
        $alert .= 'Por favor, preencha o campo MATRÍCULA<br />';
    }
    elseif(empty($phone)){
        $alert .= 'Por favor, preencha o campo TELEFONE<br />';
    }
    elseif(empty($cell)){
        $alert .= 'Por favor, preencha o campo CELULAR<br />';
    }    
    elseif(empty($email)){
        $alert .= 'Por favor, preencha o campo E-MAIL<br />';
    }
    elseif ($email != $checkEmail) {
        $alert .= 'O e-mail não foi confirmado corretamente';
    }  
    elseif(empty($adress)){
        $alert .= 'Por favor, preencha o campo ENDEREÇO<br />';
    }
    elseif(empty($neigh)){
        $alert .= 'Por favor, preencha o campo BAIRRO<br />';
    }
    elseif(empty($city)){
        $alert .= 'Por favor, preencha o campo CIDADE<br />';
    }
    elseif(empty($password)){
        $alert .= 'Por favor, preencha o campo SENHA<br />';
    }elseif ($password != $checkPassword) {
        $alert .= 'A senha não foi confirmada corretamente';
    }
    elseif ($occupation == 'informe') {
        $alert .= 'Por favor, informe sua função';
    }
    elseif ($shift == 'informe') {
        $alert .= 'Por favor, informe seu turno';
    }
    if(empty($alert)){
                
        $encryptedPassword = encodes_password($password);
                        
        check_data("INSERT INTO `tbl_user_name`(`name`, `last_name`, `user_name`, `phone_ext`, `register`, `badge`, `home_phone`, `molibe_phone`, `e-mail`, `home_adress`, `hood`, `city`, `password`, `occupation`, `shift`)
            VALUES ('$name', '$lastName','$userName','$extension','$register','$badge','$phone','$cell','$email','$adress','$neigh','$city','$encryptedPassword', '$occupation','$shift')");
        
        $alert .= 'Informações salvas com sucesso !<br />';
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User registration</title>
    <?php include_once 'header.php'; ?>
</head>
<body>      
    <?php include_once 'menu1.php'; ?>
        <div class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <h3 class="widget-title">Cadastro de usuário</h3>
                        <h5 class="text-danger">Todos os campos são obrigatórios</h5></br>
                        <h5 class="text-danger">
                            <?php if(!empty($alert)): ?>
                            <?php print $alert; ?>
                            <?php    endif; ?>
                        </h5>    
                        <div class="contact-form">
                            <form name="contactform" id="contactform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <p>
                                    <input name="name" type="text" id="name" placeholder="Digite seu nome" autofocus required>
                                </p>
                                <p>
                                    <input name="lastName" type="text" id="lastName" placeholder="Sobrenome" required>
                                </p>
                                <p>
                                    <input name="extension" type="text" id="extension" placeholder="Ramal (4 digitos)" required>
                                </p>
                                <p>
                                    <input name="register" type="text" id="register" placeholder="Matrícula" required>
                                </p>
                                <p>
                                    <input name="badge" type="text" id="badge" placeholder="Badge">
                                </p>
                                <p>
                                    <input name="phone" type="text" id="phone" placeholder="Telefone residencial: (XX) XXXX-XXXX" required>
                                </p>
                                <p>
                                    <input name="cell" type="text" id="cell" placeholder="Celular: (xx) 9XXXX-XXXX" required>
                                </p>
                                <p>
                                    <input name="email" type="email" id="email" placeholder="Seu E-mail (Preferência @flextronics.com)" required> 
                                </p>
                                <p>
                                    <input name="checkEmail" type="email" id="checkEmail" placeholder="Confirme seu e-mail" required> 
                                </p>
                                <p>
                                    <input name="adress" type="text" id="adress" placeholder="Endereço (Rua XXXX, 123)" required>
                                </p>
                                <p>
                                    <input name="neigh" type="text" id="neigh" placeholder="Bairro" required>
                                </p>
                                <p>
                                    <input name="city" type="text" id="city" placeholder="Cidade / Estado (Ex.Sorocaba-SP)" required>
                                </p>
                                <p>
                                    <input name="password" type="password" id="password" placeholder="Senha (Mínimo de 6 caracteres)" required> 
                                </p>
                                <p>
                                    <input name="checkPassword" type="password" id="checkPassword" placeholder="Confirme sua senha" required> 
                                </p>
                                <p>
                                    <select name="occupation" id="occupation" >
                                        <option value="informe" selected>Informe sua função</option>
                                        <option value="supervisor">Supervisor</option>
                                        <option value="coordenadorTecnico">Coordenador técnico</option>
                                        <option value="coordenadorProducao">Coordenador de produção</option>
                                        <option value="engenheiro">Engenheiro</option>
                                        <option value="tecnico">Técnico</option>
                                        <option value="quickrepair">Quick Repair</option>
                                    </select>
                                    <select name="shift" id="shift" >
                                        <option value="informe" selected>Informe seu turno</option>
                                        <option value="1">1T</option>
                                        <option value="2">2T</option>
                                        <option value="3">3T</option>
                                        <option value="4">ADM</option>                            
                                    </select>
                                <p/>
                                <p>
                                    <h5 class="text-danger">Todos os dados serão verificados pelo administrador</h5>
                                <p/>	
                                <p>
                                    <input type="submit" class="mainBtn" id="submit" value="SALVAR" >
                                </p>                            
                            </form>
                        </div> <!-- /.contact-form -->
                    </div>                
                </div>
            </div>
</div> <!-- /.content-section -->
    <?php include_once 'menu2.php'; ?>             
</body>
</html>