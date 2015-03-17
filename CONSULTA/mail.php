<?php
header('Content-Type: text/html; charset=utf-8');

//$body = "Email eviado pelo PHP/nEmail criado para aula";
$body = '
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Titulo</h1><br><strong>Texto em negrito</strong>
    </body>
</html>
    ';
$email_headers ="Content-type: text/html; charset=utf-8;\r\nFrom: santaguidafernando@gmail.com";

mail('contato@fernandohs.com.br', 'Email enviado pelo PHP', $body, $email_headers)

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
    </body>
</html>
