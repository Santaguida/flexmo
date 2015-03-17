<?php

echo '<br>mt_rand<br>';
echo mt_rand(0, 10); // numero aleatorio entre min e max
echo '<br>floor<br>';
echo floor(5.9); // arredonda p baixo
echo '<br>ceil<br>';
echo ceil(5.9); // arredonda p cima
echo '<br>round<br>';
echo round(5.1); // arredonda p mais proximo
echo '<br>number_format<br>';
$valor = 12345.91;
echo 'R$ ' . number_format($valor, 2,',','.');// qnt casas decimais, ponto decimal e ponto milhar
echo '<br>abs<br>';
echo abs(-10); // tira o negativo
echo '<br>pow<br>';
echo pow(2,4); // potenciação
echo '<br>max<br>';
echo max(1,3,4,6,7,10); // retorna o maximo
echo '<br>min<br>';
echo min(1,3,4,6,7,10); // retorna o minimo
echo '<br>dechex<br>';
echo dechex(255); // converte em hexa
echo '<br>hexdec<br>';
echo hexdec(100); // converte em dec
echo '<br>decbin<br>';
echo decbin(2); // converte em bin
echo '<br>bindec<br>';
echo bindec(101); // converte em dec


