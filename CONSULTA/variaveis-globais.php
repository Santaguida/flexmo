<?php

$texto = 'Oi';

function imprime_texto(){
    global $texto;
    $texto = 'Oi mundo';
}

imprime_texto();

echo $texto;
      
