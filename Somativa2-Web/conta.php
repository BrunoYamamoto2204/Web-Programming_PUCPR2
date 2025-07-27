<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Somativa 2</title>
</head>
<body>
    <header>
        <?php 
            require 'bd/conectaBD.php'; 
            require "geral/menu.php";
        ?>
    </header>

    <main>
        <?php
            $id = $_SESSION["id"];
            $user = $_SESSION["login"];
            $nome = $_SESSION["nome"];
        ?>

         <div class="exclusao-content">

            <div class="subtitulo w3-theme">
                <h1 style="margin: 0">Dados da Conta</h1>
            </div>

            <div class="dados-conta">
                <div class="info-conta">
                    <h2>Administrador</h2>
                    <p class="chave">Id: <span><?= $id ?></span></p>
                    <p class="chave">User: <span><?= $user ?></span></p>
                    <p class="chave">Nome: <span><?= $nome ?></span></p>
                    <a style="margin: 20px 5px;" href="logout.php" class="w3-btn w3-theme botao-maior">Sair</a>
                </div>

                <div class="foto-margin">
                    <h2 style="text-align: center; font-weight: 500;">Imagem</h2>
                    <img class="foto" src="./imagens/FotoUsuario.png">
                </div>
            </div>

            <div class="botoes-conta">
                <form action="ExcluirConta.php" method="GET">
                    <input type="hidden" name="idUser" value=<?= $id ?>>
                    <input type="submit" value="Excluir Conta" class="w3-btn w3-theme botao-maior">
                </form>
            </div>
        </div>
    </main>
</body>
</html>