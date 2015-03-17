<?php
header('Content-Type: text/html; charset=utf-8');

$acesso = 0;
echo 'usuário ';
echo ($acesso > 0) ? 'registrado' : 'não registrado';

echo '<br><hr><br>';

if($acesso > 0){
    echo 'Usuário registrado';
}  else {
    echo 'Usuário não registrado';    
}
