<?php

if(isset($_GET) > 0){
    foreach ($_GET as $chave => $valor) {
        echo $chave . ': ' . $valor . '<br>';        
    }
}

