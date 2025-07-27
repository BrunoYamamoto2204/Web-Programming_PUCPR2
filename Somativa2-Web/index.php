<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/customize.css">
    <title>Somativa 2</title>
</head>
<body>
    <?php 
        session_start();
        if(isset($_SESSION['login'])){
            $url = rtrim(dirname($_SERVER['SCRIPT_NAME']),"/");
            header("Location: $url/produtosListar.php");
            exit;
        }
    ?>

    <header>
        <?php require "geral/menu_login.php" ?>
    </header>

    <div class="main-login">        
        <div class="login-content">
            <img src="./imagens/Index_image.png" alt="">
            <div class="titulos">
                <h1>TECNOLOGIA AO SEU ALCANCE</h1>
                <h2>Encontre os melhores produtos para seu negócio</h2>
                <div class="botao"><a class="botao-acessar w3-theme" href="./login.php">Acessar produtos</a></div>
            </div>
        </div>
            <div class="container">
                <div class="topicos-container">
                    <div class="topico-item">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <h3>Compra Descomplicada</h3>
                        <p>Encontre e compre o periférico ideal em poucos cliques.</p>                    </div>
                    <div class="topico-item">
                        <i class="fa-solid fa-tags"></i>
                        <h3>Preços acessíveis</h3>
                        <p>Ofertas e condições especiais de pagamento.</p>
                    </div>
                    <div class="topico-item">
                        <i class="fa-solid fa-truck"></i>
                        <h3>Entrega Rápida</h3>
                        <p>Receba seu produto com segurança e agilidade em todo o Brasil./p>
                    </div>
                </div>
            </div>
    </main>
</body>
</html>

