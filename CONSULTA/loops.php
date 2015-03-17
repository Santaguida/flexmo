<?php

header('Content-Type: text/html; charset=utf-8');
echo 'for 1<br>';
for($i = 0; $i < 10; $i++){ // declara i = 0; testa i; incrementa
    echo 'i é igual a ' . $i . '<br>';
}

echo '<br><hr><br>';
echo 'for 2<br>';

for($variavel = 0; $variavel < 10; $variavel++){ // declara i = 0; testa i; incrementa
    echo 'i é igual a ' . $i . '<br>';
}

echo '<br><hr><br>';
echo 'for 3<br>';

for($variavel = 10; $variavel > 0; $variavel--){ // declara i = 0; testa i; incrementa
    echo 'i é igual a ' . $variavel . '<br>';
}

echo '<br><hr><br>';
echo 'while<br>';

$i = 0;
while($i < 10){ // apanas quando eu não sei o numero de repetições
       echo 'i é igual a ' . $i . '<br>';
       $i++;
}

echo '<br><hr><br>';
echo 'do while<br>';

$i = 0;
do{
    echo 'i é igual a ' . $i . '<br>';
    $i++;
}while($i < 10);

echo '<br><hr><br>';
echo 'while 2<br>';

$i = 10;
while($i < 10){ // apanas quando eu não sei o numero de repetições
       echo 'i é igual a ' . $i . '<br>';
       $i++;
}

echo '<br><hr><br>';
echo 'do while 2<br>';

$i = 10;
do{
    echo 'i é igual a ' . $i . '<br>';
    $i++;
}while($i < 10);