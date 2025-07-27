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
    <header>
        <?php 
            require 'bd/conectaBD.php'; 
            require "geral/menu.php";

            if ($_FILES['Foto']['size'] > 1 * 1024 * 1024) { 
                $_SESSION['erro_upload'] = "A imagem deve ter no máximo 1MB.";
                header("Location: produtosEditar.php?id=" . $_POST["id-produto"]); 
                exit;
            }
        ?>
        
    </header>

    <main>
        <h1>Produto Alterado</h1>

        <div class="incluir-content">
            <?php 
                $nome = $_POST["Nome"];
                $preco = str_replace(',', '.', $_POST["Preco"]);
                $id_categoria = $_POST["Categoria"];
                $id_produto = $_POST["id-produto"];
                $descricao = $_POST["Descricao"];
                $foto_atual_base64 = $_POST["foto-atual"]; 

                $conn = new mysqli($servername, $username, $password, $database);
                if($conn->connect_error) {
                    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
                }

                $nome = mysqli_real_escape_string($conn, $nome);
                $preco = mysqli_real_escape_string($conn, $preco);
                $descricao = mysqli_real_escape_string($conn, $descricao);
                
                $foto = null;
                if(isset($_FILES["Foto"]) && $_FILES["Foto"]["size"] > 0){
                    $foto = addslashes(file_get_contents($_FILES['Foto']['tmp_name']));
                }
                
                else{
                    $foto = base64_decode($foto_atual_base64);
                    $foto = mysqli_real_escape_string($conn, $foto);
                }

                // Envia os dados ao BD
                $sql = "UPDATE Produto 
                            SET Nome = '$nome',
                                Preco = $preco,
                                ID_Categoria = $id_categoria,
                                Descricao = '$descricao',
                                Foto = '$foto'
                            WHERE ID_Produto = $id_produto";
                // echo "<pre>DEBUG SQL: " . htmlspecialchars($sql) . "</pre>";
                $result = $conn->query($sql);

                if($result) {
                    // Procura o ID da linha que acabou de ser criada 
                    $sql2 = "SELECT Foto FROM Produto WHERE ID_Produto = $id_produto";
                    $result2 = $conn->query($sql2);

                    // Atribui em uma variável a imagem desta linha
                    $fotoBD = null;
                    if ($result2 && $result2->num_rows > 0){
                        $row = $result2->fetch_assoc();
                        $fotoBD = $row["Foto"];
                    }
                    
                    // Com o ID da Cateogria, procura seu nome
                    $sql3 = "SELECT Nome_Categoria FROM Categoria WHERE ID_Categoria = $id_categoria";
                    $result3 = $conn->query($sql3);
                    $row = $result3->fetch_assoc();
                    $categoria = $row["Nome_Categoria"];
                    
            ?>
                        <h2 class="w3-theme cadastro-sucesso">
                            Cadastro do produto editado com sucesso! 
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
                                            if(!$fotoBD) {
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
                                <a href="produtosListar.php" class="w3-btn w3-theme botao-maior">Voltar</a>
                            </div>
                        </div>
                    <?php
                    } else {
                        echo "<p class='w3-text-red'>Erro ao atualizar o produto: " . $conn->error . "</p>";
                    }
                    $conn->close(); // Fechar a conexão com o banco de dados
                ?>
        </div>
    </main>
</body>
</html>