<?php session_start();

require_once 'funcoes/verifica_login.inc.php';
require_once 'funcoes/codifica_senha.inc.php';
require_once 'servidor.php';

if(isset($_GET['msg'])){
    if($_GET['msg'] == 'semAcesso'){
        $aviso = 'Voce precisa logar para acessar o sistema<br />';
    }
    if($_GET['msg'] == 'sairSucesso'){
        $aviso = 'Voce saiu com sucesso<br />';
    }
}
if(isset($_GET['acao'])){
    if($_GET['acao'] == 'sair'){
        session_destroy();
        unset($_SESSION);
        header("Location: login.php?msg=sairSucesso");
    }
}

if(isset($_POST['login'])){
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $aviso = '';
    
    if(empty($login)){
        $aviso .= 'O login e obrigatorio<br />';
    }elseif(!verifica_login($login)){
        $aviso .= 'O login informado nao esta cadastrado<br />';
    }
    if(empty($senha)){
        $aviso .= 'A senha e obrigatoria<br />';
    }else{
        $usuarioQuery = consulta_dados("select * from usuarios where login = '$login'");
        $usuario = mysqli_fetch_array($usuarioQuery);
        $senhaCodificada = codifica_senha($senha);
        if($senhaCodificada != $usuario['senha']){
            $aviso .= 'A senha informada esta errada';
        }
    }
    
    if(empty($aviso)){
        if($usuario['status'] == 0){
            $aviso .= 'Voce precisa confirmar seu email antes de fazer o login<br />';
        }
    }
    
    if(empty($aviso)){
        $_SESSION['usuario'] = $usuario;
        $aviso = 'Sucesso<br />';
    }
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
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <p>
    <label for="login">Login: </label>
    <input type="text" name="login" id="login" />
  </p>
  <p>
    <label for="senha">Senha: </label>
    <input type="password" name="senha" id="senha" />
  </p>
  <p>
    <input type="submit" name="login2" id="login2" value="Login" />
  </p>
</form>

    <?php include_once 'menu2.php'; ?> 
</body>
</html>

