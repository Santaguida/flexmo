<?php

if( $_SERVER['SERVER_NAME'] == 'localhost' ||
    $_SERVER['SERVER_NAME'] == '127.0.0.1' ||
    $_SERVER['SERVER_NAME'] == 'flexmo')
{
define('DB_HOST', '127.0.0.1', true);
define('DB_USER', 'root', true);
define('DB_PASS', '', true);
define('DB_BASE', 'flexmo_db', true);
}else   { // My personal server
define('DB_HOST', '179.188.16.12', true);
define('DB_USER', 'fernandohs41', true);
define('DB_PASS', 'flex123', true);
define('DB_BASE', 'fernandohs41', true);
        }
$db_link = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
mysqli_select_db($db_link, DB_BASE);

function consulta_dados($query){
    global $db_link;
    $resultado = mysqli_query($db_link, $query);
    return $resultado;
}

 print_r($_SERVER);

/* Teste
$query = consulta_dados('select * from tbl_user_name');

while ($users = mysqli_fetch_array($query)){
    echo $users['name'] . '<br />';
}
*/