<?php session_start();

if(isset($_SESSION['usuario']['id'])){
    if($_SESSION['usuario']['status'] > 0){
 

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
        Voce esta logado.<br />
        <a href="login.php?acao=sair">Clique aqui para sair</a>
    <?php include_once 'menu2.php'; ?> 
</body>
</html>

<?php
    }else{
        header("Location: login.php?msg=SemAcesso");
    }    
}else{
        header("Location: login.php?msg=semAcesso");
    }

?>