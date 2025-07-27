<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Somativa 2</title>
</head>
<body>
    <header>
	        <?php require 'bd/conectaBD.php'; ?>
            <?php require "geral/menu.php";

                $erroTamanho = "";
                if(isset($_SESSION["erro_upload"])) {
                    $erroTamanho = $_SESSION["erro_upload"];
                    unset($_SESSION["erro_upload"]);
                }
            ?>
        </header>

        <main>
            <h1>Editar Produto</h1>

            <div class="main-content">
                <?php
                    $conn = new mysqli($servername, $username, $password, $database);
                    
                    if($conn->connect_error) {
                        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
                    }              

                    $sql_cat = "SELECT ID_Categoria, Nome_Categoria FROM Categoria";
                    $result_cat = $conn->query($sql_cat);
                    $opcoes_categoria = array();
                    
                    // Dados do produto pelo ID
                    $id = $_GET['id'];
                    $sql_dados = "SELECT Nome, Preco, ID_Categoria, Descricao, Foto 
                                FROM produto WHERE ID_Produto = $id";
                    $dados = $conn->query($sql_dados);
                    $row = $dados->fetch_assoc();

                    $nome = $row["Nome"];
                    $preco = $row["Preco"];
                    $id_categoria = $row["ID_Categoria"];
                    $descricao = $row["Descricao"];
                    $foto = $row["Foto"];
                    
                    // Nome da categoria
                    $sql3 = "SELECT Nome_Categoria FROM Categoria WHERE ID_Categoria = $id_categoria";
                    $result3 = $conn->query($sql3);
                    $row = $result3->fetch_assoc();
                    $categoria = $row["Nome_Categoria"];
                    
                    // Retirar da lista de opções a categoria que já estiver no produto
                    if ($result_cat->num_rows > 0){
                        while($row = $result_cat->fetch_assoc()) {
                            if ($row["ID_Categoria"] != $id_categoria)
                                array_push($opcoes_categoria, "<option value='" . $row["ID_Categoria"] . "'>" . $row["Nome_Categoria"] . "</option>");
                        }
                    }
                    else{
                        echo "Erro executando SELECT: " . $conn->connect_error;
                    }

                    if($dados){ ?>
                        <div class=form>
                            <form action="produtosEditar_exe.php" method="POST" enctype="multipart/form-data">
                                <table class='w3-table-all'>
                                    <tr><th colspan="2"><h1>Altere os Dados do Produto</h1></th></tr>
                                    <tr>
                                        <td style="width: 50%;">
                                            <input input type="hidden" value="<?php echo $id;?>" name="id-produto">
                                            <input input type="hidden" value="<?= base64_encode($foto) ?>" name="foto-atual">
                                            <div>
                                                <label>Nome*</label>
                                                <input type="text" value="<?php echo $nome;?>" name="Nome" class="w3-input cadastro-input" required>
                                            </div>
                                            <div>
                                                <label>Preco*</label>
                                                <input type="text" value="<?php echo $preco;?>" name="Preco" class="w3-input cadastro-input" required>
                                            </div>
                                            <div>
                                                <label>Descrição</label>
                                                <input type="text" value="<?php echo $descricao;?>" name="Descricao" class="w3-input cadastro-input">
                                            </div>
                                            <div>
                                                <label>Catgoria</label>
                                                <select name="Categoria" class="w3-input cadastro-input">
                                                    <option value="<?= $id_categoria ?>"><?= $categoria ?></option>
                                                    <?php 
                                                        foreach($opcoes_categoria as $key => $value) {
                                                            echo $value;
                                                        }
                                                    ?>
                                                </select>
                                            </div>

                                            <?php if ($erroTamanho != "") {?>
                                                <p class="w3-text-red"><?= $erroTamanho ?></p>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <div class="imagem-produto">
                                                <h2>Imagem do Produto</h2>
                                                <?php 
                                                    if ($foto){ ?>
                                                        <p><img id="imagemSelecionada" src="data:image/png;base64,<?= base64_encode($foto); ?>"></p> 
                                                    <?php }
                                                    else{ ?>
                                                        <p><img id="imagemSelecionada" src="./imagens/SemFoto.png"></p> 
                                                    <?php }
                                                ?>

                                                <label class="w3-btn w3-theme cadastro-input">
                                                    Selecione uma Imagem
                                                    <input type="file" name="Foto" accept="image/*" onchange="carregarImagem(this);" style="display: none;">
                                                </label>
                                                <div >
                                                    <p class="texto-aviso-1">Imagens máxima de 1MB.</p>
                                                    <p class="texto-aviso-2">Salvar imagens diretamente no banco não é a forma mais adequeda,<br> por esse motivo serão aceitas apenas imagens leves</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <div class="enviarCancelar">
                                                <input type="submit" value="Editar Produto" class="w3-btn w3-theme cadastro-input">
                                                <a href="produtosListar.php" class="w3-btn w3-theme botao-borda">Voltar</a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    <?php }
                    else { ?>
                        <div class="w3-container w3-theme">
                            <h2>Médico inexistente</h2>
                        </div>
                        <br>
                    <?php }
                ?>
            </div>
        </main>
    </div>
</body>
</html>