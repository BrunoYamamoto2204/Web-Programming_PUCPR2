<?php 
    session_start();

    $url = rtrim(dirname($_SERVER['SCRIPT_NAME']),"/");
    header("Location: $url/produtosListar.php");
    exit;
?>