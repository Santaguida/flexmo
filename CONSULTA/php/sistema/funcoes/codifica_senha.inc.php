<?php

function codifica_senha($senha){
    $fraseSecreta = 'frase secreta';
        $senhaCodificada = hash('sha512', $fraseSecreta . $senha);
        return $senhaCodificada;
}

