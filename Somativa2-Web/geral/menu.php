<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/customize.css">

<?php 
    session_start();
    if(!isset($_SESSION['login'])){
        $url = rtrim(dirname($_SERVER['SCRIPT_NAME']),"/"); 
		header("location: $url/index.php");
    }
?>

<div class="layout-header w3-theme ">
    <div class="header-content">
        <!-- Logo -->
        <h1 class="logo">
            <img src="imagens/Logo.png" alt="">
        </h1>
        <!-- Navbar -->
        <nav class="nav">
            <a class="w3-button" href="produtosIncluir.php">Novo Cadastro</a>
            <a class="w3-button" href="produtosListar.php">Produtos</a>
            
            <a class="w3-button" href="conta.php">
                <img class="foto-menu" src="imagens/FotoUsuario.png" alt="">
                <span><?= $_SESSION["login"] ?> </span>
            </a>
            
        </nav>
    </div>

    <script src="js/ScriptLoja.js"></script>
</div>