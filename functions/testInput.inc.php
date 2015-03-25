<?php

/**
 * Função trata dados
 * @param type $data
 * @return type
 * Retira espaço no ínicio e final de uma string
 * Remove barras invertidas de uma string.
 * Converte caracteres especiais para a realidade HTML
 */

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
