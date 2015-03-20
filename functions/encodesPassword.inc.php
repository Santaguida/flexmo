<?php

/**
 * Função codifica senha
 * @param type $password
 * @return type encodes password
 */

function encodes_password($password){
    $passPhrase = 'frase secreta';
        $encodesPassword = hash('sha512', $passPhrase . $password);
        return $encodesPassword;
}

