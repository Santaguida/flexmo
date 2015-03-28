<?php

$language = $_GET["language"];
$page = $_GET['page'];

session_start();
    $_SESSION["language"] = $language;
    Header("Location: ".$page);
    
?>