<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Jogo Adivinha Número</title>
    <style>
        body { background-color: darkolivegreen;  }
        p    { font-family: verdana; color: white; font-size: 18px;}
        input{ font-family: verdana; color: darkolivegreen; font-size: 18px;}  
    </style>
</head>
<body>
    <?php 
        // Inicia uma seção 
        session_start();
    ?>
        <p>Adivinhe o Número que eu estou pensando entre 1 e 100...</p>
        <form action="#" method="post">
            <input type="text"   name="entrada">
            <input type="submit" value="Tentar">
        </form>
        <br/>

    <?php
        // Cria as variáveis da seção 
        if(!isset($_SESSION["numero"])) {
            $_SESSION["tentativas"] = 1;
            $_SESSION["numero"] = rand(1, 100);
            echo "<p>". $_SESSION["numero"]. "</p>";
        }

        // Começa o jogo 
        if(isset($_POST["entrada"]) && $_POST["entrada"] != "s"){
            $entrada = $_POST["entrada"];

            if($entrada < $_SESSION["numero"]){
                echo "<p>Tentativas: <strong>" . $_SESSION["tentativas"] . "</strong></p>";
                echo "<p>O número é<strong> MAIOR </strong>que " . $entrada . "</p>";
                $_SESSION["tentativas"] ++;
            }

            else if($entrada > $_SESSION["numero"]){
                echo "<p>Tentativas: <strong>" . $_SESSION["tentativas"] . "</strong></p>";
                echo "<p>O número é<strong> MENOR </strong>que " . $entrada . "</p>";
                $_SESSION["tentativas"] ++;

            }

            else {
                echo "<p>Parabéns, você acertou! Número = " . $_SESSION["numero"] . "<p>";
                echo "<p>Tentativas: <strong>" . $_SESSION["tentativas"] . "</strong></p>";
                echo "<p>Para jogar novamente digite <strong>s</strong></p>";
            }
        }

        // Destroi a seção quando o jogo acaba 
        elseif(isset($_POST["entrada"]) && $_POST["entrada"] == "s") { 
            unset($_SESSION["numero"]); 
            session_destroy(); 
        }

    ?>
</body>
</html>