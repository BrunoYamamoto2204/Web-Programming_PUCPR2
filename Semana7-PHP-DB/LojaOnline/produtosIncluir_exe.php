<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/customize.css">
    <title>Formativa S7</title>
</head>
<body>
    <header>
        <?php require 'bd/conectaBD.php'; ?>
        <?php require "geral/menu.php" ?>
    </header>

    <main>
        <h1>Produto Adicionado</h1>

        <div class="incluir-content">
            <?php 
                $nome = $_POST["Nome"];
                $preco = $_POST["Preco"];
                $categoria = $_POST["Categoria"];
                $descricao = $_POST["Descricao"];

                $conn = new mysqli($servername, $username, $password, $database);
                if($conn->connect_error) {
                    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
                }

                if($_FILES["Foto"]["size"] > 0){
                    $foto = addslashes(file_get_contents($_FILES['Foto']['tmp_name']));
                }
                else{
                    $foto = NULL;
                }

                $sql = "INSERT INTO Produto (Nome, Preco, Categoria, Descricao, Foto) VALUES ('$nome', '$preco', '$categoria', '$descricao', '$foto')";
                $result = $conn->query($sql);

                // Procura o ID da linha que acabou de ser criada 
                $idInserido = $conn->insert_id; 
                $sql2 = "SELECT Foto FROM Produto WHERE ID_Produto = $idInserido";
                $result2 = $conn->query($sql2);

                // Atribui em uma variável a imagem desta linha
                $row = $result2->fetch_assoc();
                $fotoBD = $row["Foto"];

                if($result) {
                    ?>
                        <h2 class="w3-theme cadastro-sucesso">
                            Produto cadastrado com sucesso! 
                        </h2>
                        <div class="dados-cadastrados">
                            <table class="w3-table-all">
                                <tr>
                                    <th>Nome</th>
                                    <th>Preco</th>
                                    <th>Categoria</th>
                                    <th>Descricao</th>
                                    <th>Foto</th>
                                </tr>

                                <tr>
                                    <td><?= $nome ?></td>
                                    <td>R$ <?= $preco ?></td>
                                    <td><?= $categoria ?></td>
                                    <td><?= $descricao ?></td>
                                    <td>
                                        <?php 
                                            if(!$foto) {
                                                echo '<img class="foto" src="imagens/SemFoto.png">';
                                            }
                                            else {
                                                echo '<img class="foto" src="data:image/png;base64,' . base64_encode($fotoBD) . '" />';
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </table>

                            <div style="text-align: center;">
                                <a href="produtosListar.php" class="w3-btn w3-theme botao-voltar">Voltar</a>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </main>
</body>
</html>