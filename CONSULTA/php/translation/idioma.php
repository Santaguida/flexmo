<?php

$idioma = $_GET["idioma"];
$pagina = $_GET['pagina'];

session_start();
    $_SESSION["idioma"] = $idioma;
    Header("Location:".$pagina);
    
?>
