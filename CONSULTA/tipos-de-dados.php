<?php

// numeros inteiros
$variavel = 13;
echo is_integer($variavel); // diz se é verdade que a variavel é integer
echo '<br>'; 

// numeros com ponto flutuante
$variavel = 13.10;
echo 'Float: ' . is_float($variavel); // diz se é verdade que a varuavel é float
echo '<br>'; 

// strings
$variavel = "Fernando Santaguida";
$variavel = 'Fernando Santaguida';
echo is_string($variavel);
echo '<br>'; 

// boleanos = bool
$variavel = true;
$variavel = false;
echo is_bool($variavel);
echo '<br>'; 

//arrays
$variavel = array(1,2,3,10.1,'Fernando', true);
echo is_array($variavel);
echo '<br>'; 

//objetos
//$variavel = new Objeto();

// recursos
$variavel = mysql_connect('localhost', 'root');
echo is_resource($variavel);
echo '<br>'; 

// nulo
$variavel = null;
echo is_null($variavel);
echo '<br>'; 

echo gettype($variavel); //diz que tipo de variavel é