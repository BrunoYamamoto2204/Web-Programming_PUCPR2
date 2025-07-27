<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Somativa 2</title>
</head>
<body>
    <?php
        require "bd/conectaBD.php";
        require "geral/menu.php";

        $id = $_GET["idUser"];
    ?>

    <main>
        <div class="confExclusaoConta">
            <h2 class="w3-theme">Tem certeza que deseja excluir sua conta?</h2>
            <form action="ExcluirConta_exe.php" method="GET">
                <input type="hidden" name="idUser" value="<?= $id ?>">
                <button class="w3-btn w3-theme botao-maior" type="submit">Sim, excluir conta</button>
                <a class="w3-btn botao-maior" href="conta.php">Cancelar</a>
            </form>
        </div>
    </main>
</body>
</html>