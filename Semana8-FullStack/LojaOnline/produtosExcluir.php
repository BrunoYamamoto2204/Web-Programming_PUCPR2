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
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
            }

            // ID do produto
            $id = $_GET["id"];
            
            // Dados do produto
            $sql = "SELECT Nome, Preco, ID_Categoria, Descricao, Foto
                    FROM Produto WHERE ID_Produto = $id";
            $result = $conn->query($sql);
            $produto = $result->fetch_assoc();

            $nome = $produto["Nome"];
            $preco = $produto["Preco"];
            $id_categoria = $produto["ID_Categoria"];
            $descricao = $produto["Descricao"];
            $foto = $produto["Foto"];

            // Nome da categoria
            $sql2 = "SELECT Nome_Categoria FROM Categoria WHERE ID_Categoria = $id_categoria";
            $result2 = $conn->query($sql2);
            $row = $result2->fetch_assoc();
            $categoria = $row["Nome_Categoria"];
        ?>
        
        <div class="exclusao-content">

            <div class="subtitulo">
                <h1 style="margin: 0">Tem certeza que deseja excluir o produto?</h1>
                <h2>O produto será removido permanentemente do seu catálogo</h2>
            </div>

            <div class="dados-exclusao">
                <div class="info-exclusao">
                    <p class="chave">ID: <span><?= $id ?></span></p>
                    <p class="chave">Nome: <span><?= $nome ?></span></p>
                    <p class="chave">Preco: <span>R$ <?= $preco ?></span></p>
                    <p class="chave">Categoria: <span><?= $categoria ?></span></p>
                    <p class="chave">Descricao: <span><?= $descricao ?></span></p>
                </div>
 
                <div class="foto-margin">
                    <h2 style="text-align: center; font-weight: 500;">Imagem</h2>
                    
                    <div class="foto-redonda">
                        <?php
                            if (!$foto){?> 
                                <img class="foto" src="./imagens/SemFoto.png">
                            <?php }
                            else{?> 
                                <img class="foto" src="data:image/png;base64, <?= base64_encode($foto) ?>">
                            <?php }
                        ?>
                    </div>
                </div>
            </div>

            <div class="botoes-exclusao">
                <div class="div-botoes">
                    <form action="./produtosExcluir_exe.php" method="POST">
                        <input type="submit" value="Excluir" class="w3-btn w3-theme botao-maior">
                        <input type="hidden" name="id" value=<?= $id ?>>
                        <input type="hidden" name="nome" value="<?= $nome ?>">
                        <a style="margin: 20px 5px;" href="produtosListar.php" class="w3-btn w3-theme botao-maior">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>