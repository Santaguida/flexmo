<?php
/*
$meses[] = 'Janeiro';
$meses[] = 'Fevereiro';
$meses[] = 'Marco';
$meses[] = 'Abril';
$meses[] = 'Maio';
$meses[] = 'Junho';
$meses[] = 'Julho';
$meses[] = 'Agosto';
$meses[] = 'Setembro';
$meses[] = 'Outubro';
$meses[] = 'Novembro';
$meses[] = 'Dezembro';
*/
$dias_da_semana = array('Domingo', 'Segunda', 'Terca', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
$meses = array(
            'Janeiro',
            'Fevereiro',
            'Marco',
            'Abril',
            'Maio',
            'Junho',
            'Julho',
            'Agosto',
            'Setembro',
            'Outubro',
            'Novembro',
            'Dezembro',    
        ); 

echo $dias_da_semana[date('w')] . ', ' . date('d') . ' de ' . $meses[date('m')-1] . ' de ' . date('Y');

echo '<br><hr><br>';

echo '<pre>';
print_r($meses);
print_r($meses[0]);
echo '</pre>';

echo '<br><hr><br>';

echo '<pre>';
var_dump($meses);
var_dump($meses[0]);
echo '</pre>';