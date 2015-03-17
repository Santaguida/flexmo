<?php
$sucesso = false;
if(!empty($_GET['token'])){
    $token = $_GET['token'];
    require_once 'servidor.php';
    $verificaToken = consulta_dados("select id from usuarios where token = '$token'");
    if(mysqli_num_rows($verificaToken) > 0){
        consulta_dados("update usuarios set status = 1 where token = '$token'");
        $sucesso = true;
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
    <?php if($sucesso): ?>
        voce confirmou com sucesso o seu login.<br />
        <a href="login.php">Clique aqui</a>
    <?php else: ?>
        Ocorreu algum problema ao confirmar o email<br />
        Envie um email para: <a href="mailto:santaguidafernando@gmail.com">santaguidafernando@gmail.com</a>
    <?php endif; ?>    

    <?php include_once 'menu2.php'; ?> 
</body>
</html>
