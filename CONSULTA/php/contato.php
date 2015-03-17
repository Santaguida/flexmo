<?php 
$sucesso = FALSE;

if (isset($_POST['nome'])){ // isset return verdadeiro se a var existe
    $aviso = '';
        
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $area = $_POST['area'];
    $mensagem = $_POST['mensagem'];
    
    if(empty($nome)){ //empty return verdadeiro se a variavel não existe ou esta em branco
        $aviso .= 'Favor preencher o nome<br />';
    }
    if(empty($email)){
        $aviso .= 'Favor preencher o email<br />';
    }
    if(empty($area)){
        $aviso .= 'Favor preencher a area<br />';
    }  else {
        if($area == 'vendas'){
            $email_to = 'vendas@fernandohs.com.br';
        }elseif($area == 'suporte'){
            $email_to = 'suporte@fernandohs.com.br';
        }  else {
            $aviso .= 'Area selecionada e invalida<br>';
        }
    }
    if(empty($mensagem)){
        $aviso .= 'Favor preencher a mensagem<br />';
    }
    if(empty($aviso) && isset($email_to)){
        $body = '
            <!DOCTYPE html>
            <html>
                <head>
                    <title></title>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                </head>
                <body>
                    Email enviado atraves do site<br/>';
        $body .= date('d/m/Y h:m:s') . '<br/>';
        $body .= 'Nome: ' . $nome . '<br/>';
        $body .= 'Email: ' . $email . '<br/>';
        $body .= 'Area: ' . $area . '<br/>';
        $body .= 'Mensagem:<br/>' . nl2br($mensagem) . '<br/>';
        $body .= '</body></html>';
        
        $email_headers = "Content-type: text/html; charset=utf-8;";
        $email_headers .="\r\n" . $email;
        
        $retorno =  mail($email_to, 'Email enviado atraves do formulario de contato', $body, $email_headers);
        if($retorno){
            $sucesso = true;
            $aviso = 'Email enviado com sucesso';
        }else{
            $aviso = 'Erro ao enviar email, favor tente mais tarde<br/>';
        }
    }
}
?>

<html>
    <head>
        <title>Formulario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php if(!empty($aviso)): ?>
            <h2><?php print $aviso ?></h2>
        <?php endif; ?>
        <?php if(!$sucesso): ?>    
            <form action="contato.php" method="post">
                <label for="nome">Nome</label> <input type="text" name="nome" id="nome" value="<?php if(isset($nome)){echo $nome; } ?>"/><br />
                <label for="nome">Email </label> <input type="text" name="email" id="email" value="<?php if(isset($email)){echo $email; } ?>"/><br />
                Selecione para quem quer enviar:<br />
                <select name="area">
                    <option value="vendas">Vendas</option>
                    <option value="suporte">Suporte</option>
                </select><br />
                Mensagem<br />
                <textarea name="mensagem" cols="40" rows="10" value="<?php if(isset($mensagem)){echo $mensagem; } ?>"></textarea>
                <br/>
                <input type="submit" value="enviar" />

            </form>
        <?php endif; ?>    
    </body>
</html><?php
