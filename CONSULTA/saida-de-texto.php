<?php

header('Content-Type: text/html; charset=utf-8');

$operador = '!!';
$numero = 13;
echo 'Olá mundo' . ' ' . $numero . $operador;

echo '<br>';

echo "Olá mundo" . " " . $numero . $operador;

echo '<br>';

echo 'Olá mundo $numero$operador';

echo '<br>';

echo "Olá mundo $numero$operador";

echo '<br>';

echo 'Olá mundo ' . $numero . $operador;

echo '<br><pre>';

echo "Olá mundo \n$numero\n$operador";

echo "\n" . 'Olá mundo' . "\n" . $numero . "\n" . $operador;  //melhor maneira

echo '</pre><br>';

echo '<a href="http://www.fernandohs.com.br">Fernando</a>';

echo '<br>';

echo 'E ele falou: "Use \'aspas\' simples"';