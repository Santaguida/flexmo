<?php

require_once 'funcoes/verifica_email.inc.php';
require_once 'funcoes/codifica_senha.inc.php';
$sucesso = false;

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $aviso = '';
    
    require_once 'servidor.php';
    if(empty($email)){
        $aviso .= 'O email e um compo obrigatorio<br />';
    }elseif(!verifica_email($email)){
        $aviso .= 'O email informado nao esta cadastrado<br />';
        
    }
    if(empty($aviso)){
        $caracteres_possiveis = array('a','b','c','d','e','f',2,3,4,5,6,7,8,9);
        $senha_nova = '';
        for($i = 0; $i < 5; $i++){
            $senha_nova .= $caracteres_possiveis[mt_rand(0, count($caracteres_possiveis)-1)];
        }
        $senhaNovaCodificada = codifica_senha($senha_nova);
        $body = 'Aqui esta a sua nova senha\n';
        $body .= $senha_nova;
        mail($email, 'Recuperacao de senha', $body);
        
        consulta_dados("update usuarios set senha = '$senhaNovaCodificada' where email = '$email'");
        $aviso .= 'Sucesso<br />';
        $sucesso = true;
    }
    //fd876
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
    <?php include_once 'header.php'; ?>
</head>
<body>
    <?php include_once 'menu1.php'; ?>
    <?php if(!empty($aviso)): ?>
        <?php print $aviso; ?>
    <?php    endif; ?>
    
    <?php if(!$sucesso): ?>
    Digite o seu email para recuperar a sua senha
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <p>
            <label for="email">E-mail: </label>
            <input type="email" name="email" id="email" />
          </p>
          <p>
            <input type="submit" name="login" id="login" value="Login" />
          </p>
        </form>

    <?php include_once 'menu2.php'; ?>
    <?php endif; ?>
</body>
</html>