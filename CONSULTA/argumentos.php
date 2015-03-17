<?php

function  foo(){
    $numero_de_argumentos = func_num_args();
    echo 'Numero de argumentos: ' . $numero_de_argumentos . '<br/>';
    if($numero_de_argumentos >= 2){
        echo 'O segundo argumento e: ' . func_get_arg(1) . '<br/>';
    }
    $argumentos = func_get_args();
    foreach ($argumentos as $variavel => $valor) {
        echo 'Argumentos' . $variavel . 'e: ' . $valor . '<br/>';
    }
}

foo(1, 2, 'Oi', 'mundo', 10,2);