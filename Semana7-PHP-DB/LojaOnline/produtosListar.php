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
    <div class="layout">
        <header>
            <?php require 'bd/conectaBD.php'; ?>
            <?php require "geral/menu.php" ?>
        </header>

        <main>
            <h1>Produtos</h1>

            <div class="main-content">
                <?php 
                    $conn = new mysqli($servername, $username, $password, $database);

                    if ($conn->connect_error) {
                        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM produto ORDER BY produto.Nome";
                    $result = $conn->query($sql);

                    echo "<div class='w3-responsive w3-card-2'>";

                    echo "<table class='w3-table-all'>";
                    
                    echo "	<tr>";
                    echo "	  <th width='8%'>Id_produto</th>";
                    echo "	  <th width='20%'>Nome</th>";
                    echo "	  <th width='20%'>Foto</th>";
                    echo "	  <th width='15%'>Preco</th>";
                    echo "	  <th width='15%'>Categoria</th>";
                    echo "	  <th width='20%'>Descricao</th>";
                    echo "	</tr>";

                    while($row = $result->fetch_assoc()){
                        $cod = $row["ID_Produto"];
                        $nome = $row["Nome"];
                        $preco = $row["Preco"];
                        $categoria = $row["Categoria"];
                        $descricao = $row["Descricao"];
                        
                        echo "<tr><td>" . $cod . "</td>";
                        echo "<td>" . $nome . "</td>";

                        if (!$row["Foto"]){ 
                           ?>
                            <td>
                                <img class="foto" src="imagens/SemFoto.png" alt="">
                            </td>
                           <?php
                        }
                        else{
                            ?>
                            <td>
                                <img class="foto" src="data:image/png;base64,<?= base64_encode($row['Foto']) ?>" />
                            </td>
                            <?php
                        }

                        echo "<td>R$ " . $preco . "</td>";
                        echo "<td>" . $categoria . "</td>";
                        echo "<td>" . $descricao . "</td></tr>";
                    }
                    echo "  </table>";
                    echo "</div>";
                ?>
            </div>
        </main>
    </div>

    <?php require "geral/rodape.php"?>
</body>
</html>