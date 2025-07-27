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
    <div class="layout">
        <header>
            <?php 
                require 'bd/conectaBD.php';
                require "geral/menu.php";
            
                $produtoExcluido = "";
                if(isset($_SESSION["produtoExcluido"])) {
                    $produtoExcluido = $_SESSION["produtoExcluido"];
                    unset($_SESSION["produtoExcluido"]);
                }
            ?>
        </header>

        <main>
            <h1>Produtos</h1>
            <h2 class="aviso-exclusao" style="display: none;"></h2>

            <?php 
                if ($produtoExcluido != "") { ?>
                    <script>
                        mensagemExclusao("<?=$produtoExcluido?>");
                    </script>
                <?php }
            ?>

            <div class="main-content">
                <?php 
                    $conn = new mysqli($servername, $username, $password, $database);

                    if ($conn->connect_error) {
                        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
                    }

                    $sql = "SELECT Produto.*, Categoria.Nome_Categoria 
                            FROM Produto 
                            JOIN Categoria ON (Produto.ID_Categoria = Categoria.ID_Categoria) 
                            ORDER BY produto.Nome";
                    $result = $conn->query($sql);

                    echo "<div class='w3-responsive w3-card-2'>";

                    echo "<table class='w3-table-all'>";
                    
                    echo "	<tr>";
                    echo "	  <th width='8%'>Id_produto</th>";
                    echo "	  <th width='15%'>Nome</th>";
                    echo "	  <th width='15%'>Foto</th>";
                    echo "	  <th width='15%'>Preco</th>";
                    echo "	  <th width='15%'>Categoria</th>";
                    echo "	  <th width='20%'>Descricao</th>";
                    echo "	  <th width='20%'>Ações</th>";
                    echo "	</tr>";

                    while($row = $result->fetch_assoc()){
                        $cod = $row["ID_Produto"];
                        $nome = $row["Nome"];
                        $preco = $row["Preco"];
                        $categoria = $row["Nome_Categoria"];
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
                        echo "<td>" . $descricao . "</td>";
                        echo "<td>"  ?>  
                                        <div class='td-acoes'>
                                            <a href="./produtosEditar.php?id=<?php echo $cod; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </div>
                                        <div class='td-acoes'>
                                            <a href="./produtosExcluir.php?id=<?php echo $cod; ?>"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    <?php 
                             "</td>";
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