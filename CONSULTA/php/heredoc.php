<?php

header('Content-Type: text/html; charset=utf-8'); //Acaba com problemas de acentuação
// Tbm pode usar HTML

$nome = 'Fernando';

$santaguida = <<<QQC
        exemplo de variavel definida pela sintaxe heredoc<br />
        É possivel expandir variaveis: $nome;
QQC;

echo $santaguida;

