<?php session_start();

if(isset($_SESSION['usuario']['id'])){
    if($_SESSION['usuario']['status'] > 0){

require_once 'funcoes/codifica_senha.inc.php';
require_once 'servidor.php';
$sucesso = false;
        
if(isset($_POST['senha-antiga'])){
    $senha_antiga = $_POST['senha-antiga'];
    $senha = $_POST['senha'];
    $confirmaSenha = $_POST['confirma-senha'];
    $usuario_id = $_SESSION['usuario']['id'];
    $aviso = '';
        
    if(empty($senha_antiga)){
        $aviso .= 'A senha antiga e obrigatoria<br />';
    }else{
        $usuarioQuery = consulta_dados("select * from usuarios where id = '$usuario_id'");
        $usuario = mysqli_fetch_array($usuarioQuery);
        $senhaCodificada = codifica_senha($senha_antiga);
        if($senhaCodificada != $usuario['senha']){
            $aviso .= 'A senha antiga informada esta errada<br />';
        }
    }
    if(empty($senha)){
        $aviso .= 'A nova senha e um compo obrigatorio<br />';
    }elseif ($senha != $confirmaSenha) {
        $aviso .= 'A confirmacao da nova senha esta errada';
    }
    if(empty($aviso)){
        $novaSenhaCodificada = codifica_senha($senha);
        consulta_dados("update usuarios set senha = '$novaSenhaCodificada' where id = '$usuario_id'");
        $sucesso = true;
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
    
    <?php if(!$sucesso): ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <p>
            <label for="senha-antiga">Senha antiga: </label>
            <input type="password" name="senha-antiga" id="senha-antiga" />
          </p>
          <p>
            <label for="senha-antiga">Nova senha: </label>
            <input type="password" name="senha" id="senha" />
          </p>
          <p>
            <label for="confirma-senha">Confirmacao da nova senha: </label>
            <input type="password" name="confirma-senha" id="confirma-senha" />
          </p>
          <p>
            <input type="submit" name="trocar-senha" id="trocar-senha" value="Trocar senha" />
          </p>
        </form>
    <?php endif; ?>
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