<?php

header('Content-Type: text/html; charset=utf-8');

//include 'funcoes/data-por-extenso.inc.php';//se n existe, continua o script
require_once 'funcoes/data-por-extenso.inc.php';

$fim_do_mundo = mktime(0, 0, 0, 12, 21, 2020);
$fim_do_mundo_segundos = $fim_do_mundo - time();

echo data_por_extenso($fim_do_mundo);
echo '<br>';
echo 'Faltam ' . number_format($fim_do_mundo_segundos, 0, ',','.') . ' segundos para o fim do mundo';
