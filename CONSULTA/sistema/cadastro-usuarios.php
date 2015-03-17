<?php

require_once 'funcoes/verifica_login.inc.php';
require_once 'funcoes/codifica_senha.inc.php';

if(isset($_POST['nome'])){
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $confirmaSenha = $_POST['confirma-senha'];
    $aviso = '';
    
    require_once 'servidor.php';
    
    if(empty($nome)){
        $aviso .= 'O nome e um compo obrigatorio<br />';
    }
    if(empty($email)){
        $aviso .= 'O email e um compo obrigatorio<br />';
    }
    if(empty($login)){
        $aviso .= 'O login e um compo obrigatorio<br />';
    }elseif(verifica_login($login)){
        $aviso .= 'O login ja existe <br />';
        
    }
        
    if(empty($senha)){
        $aviso .= 'A senha e um compo obrigatorio<br />';
    }elseif ($senha != $confirmaSenha) {
        $aviso .= 'A confirmacao da senha esta errada';
    }
    if(empty($aviso)){
        
        
        $senhaCodificada = codifica_senha($senha);
        
        $token = md5($fraseSecreta . $email);
        $body = 'Favor confirme o seu cadastro clicando no link abaixo\n';
        $body .= 'http://localhost/phponline/sistema/confirmar-email.php?token=' .$token;
        mail($email, 'Confirmacao de cadastro', $body);
        
        consulta_dados("insert into usuarios (nome, sobrenome, email, login, senha, token)
                        values ('$nome', '$sobrenome','$email','$login','$senhaCodificada', '$token')");
        
        $aviso .= 'Sucesso<br />';
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
    
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <p>
    <label for="nome2">Nome: </label>
    <input type="text" name="nome" id="nome2" />
  </p>
  <p>
    <label for="sobrenome">Sobrenome:</label>
    <input type="text" name="sobrenome" id="sobrenome" />
  </p>
  <p>
    <label for="email">E-mail</label>
    :
  <input type="text" name="email" id="email" />
  </p>
  <p>
    <label for="login">Login:</label>
    <input type="text" name="login" id="login" />
  </p>
  <p>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" />
  </p>
  <p>
    <label for="confirma_senha">Confirmacao de senha:</label>
    <input type="password" name="confirma-senha" id="confirma_senha" />
  </p>
  <p>
    <input type="submit" name="cadastrar" id="cadastrar" value="Cadastrar" />
  </p>
</form>

    <?php include_once 'menu2.php'; ?> 
</body>
</html>
