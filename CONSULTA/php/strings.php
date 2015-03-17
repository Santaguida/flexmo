<?php
header('Content-Type: text/html; charset=utf-8');

$texto = 'O rato roeu a roupa do rei de Roma';

// Contagem
echo 'Contagem<br>';
echo 'strlen<br>';
echo strlen($texto); // exibe o numero de caracteres da string

echo '<br>';
echo 'substr_count<br>';
echo substr_count($texto, 'r'); // quantidade do caracter (r)

echo '<br><hr><br>';
echo 'Localização<br>';

// Localização
echo 'substr<br>';
echo substr($texto, 2, 4); // caracter inicial (2), até qual (4)
echo '<br>strpos<br>';
echo strpos($texto, 'r'); // da a posição do 1º r (2)
echo '<br>strrpos<br>';
echo strrpos($texto, 'r');
echo '<br>stripos<br>';
echo stripos($texto, 'R');// case sensitive
echo '<br>strripos<br>';
echo strripos($texto, 'R');

echo '<br><hr><br>';
echo 'Substituição<br>';

// Substituição
echo 'str_replace<br>';
echo str_replace(' ', '', $texto); //busca espaço, substitui por nada
echo '<br>';
echo str_replace('r', '$', $texto); //busca espaço, substitui por $
echo '<br>';
echo str_ireplace('r', '$', $texto); //busca espaço, substitui por $ e é case sensitive

echo '<br><hr><br>';
echo 'Modificação<br>';

// Modificação

echo '<br>rtrim<br>';
echo rtrim($texto); // remove espaços em branco no final
echo '<br>ltrim<br>';
echo ltrim($texto); // remove espaços em branco no inicio
echo '<br>trim<br>';
echo trim($texto); // remove espaços em branco no inicio ou final
echo '<br>strtoupper<br>';
echo strtoupper($texto); // tudo para maiusculo
echo '<br>strtolower<br>';
echo strtolower($texto); // tudo para minusculo
echo '<br>ucfirst<br>';
echo ucfirst($texto); // Primeiro caracter em maiusculo