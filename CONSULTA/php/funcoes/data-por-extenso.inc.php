<?php

function data_por_extenso($time){
    $dias_da_semana = array('Domindo', 'Segunda', 'Terca', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
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
    
    return date('d',$time) . ' de ' . $meses[date('m', $time)-1] . ' de ' . date('Y', $time);
}

