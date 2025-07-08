<?php
session_start();

// Obtém o caminho até o index.php, ex: /Semana7-PHP-DB/Consultorio
$url = dirname($_SERVER['SCRIPT_NAME']);

// Remove a barra final, se tiver
$url = rtrim($url, '/');

// Redireciona para medlistar.php dentro da mesma pasta
header("Location: $url/medlistar.php");
exit;
?>