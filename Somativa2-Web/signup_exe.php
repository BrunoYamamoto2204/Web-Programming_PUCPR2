<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Somativa 2</title>
</head>
<body>
    <header>
        <?php require 'bd/conectaBD.php'; ?>
        <?php require "geral/menu_login.php" ;?>
    </header>

    <?php 
        session_start();
        require "bd/conectaBD.php";

        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error){
            die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
        }

        $nome = $_POST["name"];
        $celular = $_POST["celular"];
        $email = $_POST["email"];
        $user = $_POST["user"];
        $senha = md5($_POST["password"]);

        if ($nome == ""){
            $nome = "Usuário";
        }
        if ($celular == ""){
            $celular = "Sem telefone";
        }

        $sql = "INSERT INTO Login (Nome, Email, Celular, User, Senha)
                VALUES ('$nome','$email', '$celular', '$user','$senha')";
        $result = $conn->query($sql);

        if($result){?>
            <main class="main-signup-exe">
                <h1 class="w3-theme signup-sucesso">Cadastro realizado com Sucesso!</h1>

                <div class="texto-signup">
                    <h2>Seja Bem Vindo(a) <?= $nome ?>!</h2>
                    <h3>Volte e realize o login para acessar os todos os recursos</h3>
                    <a href="./login.php" class="signup-exe-button">Voltar</a> 
                </div>
            </main>
        <?php
        } 
    ?>
    
</body>
</html>