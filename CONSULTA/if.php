<?php
header('Content-Type: text/html; charset=utf-8');

$idade = 18;

if($idade >= 18){
    echo 'Você é maior de idade';
}
/*
 * == igualdade
 * != desigualdade
 * > maior que
 * >= maior ou igual a
 * < menor que
 * <= menor ou igual a
 */

echo '<br><hr><br>';

$nacionalidade = 'brasileira';

if($idade >= 18 && $nacionalidade != 'brasileira'){
    echo 'Seja bem vindo';
}else{
    echo 'Você não tem acesso a isto';
}
/*
 * && e
 * || ou
 */

echo '<br><hr><br>';

if($idade >= 18 && $nacionalidade != 'brasileira'){
    echo 'Seja bem vindo';
}elseif($idade < 18){
    echo 'Você precisa ter 18 anos ou mais';
}elseif($nacionalidade == 'brasileira'){
    echo 'Em breve estaremos chegando no Brasil';
}else{
    echo 'Você não tem acesso a isto';
}

echo '<br><hr><br>';

$verdade = false;
if(!$verdade){
    echo 'Não é verdade!';
}