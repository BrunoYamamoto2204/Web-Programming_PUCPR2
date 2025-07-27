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
            <h1>Novo Produto</h1>

            <div class="main-content">
                <?php
                    $conn = new mysqli($servername, $username, $password, $database);
                    
                    if($conn->connect_error) {
                        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
                    }              

                    $sql_cat = "SELECT ID_Categoria, Nome_Categoria FROM Categoria";
                    $result_cat = $conn->query($sql_cat);
                    $opcoes_categoria = array();
                    
                    if ($result_cat->num_rows > 0){
                        while($row = $result_cat->fetch_assoc()) {
                            array_push($opcoes_categoria, "<option value='" . $row["ID_Categoria"] . "'>" . $row["Nome_Categoria"] . "</option>");
                        }
                    }
                    else{
                        echo "Erro executando SELECT: " . $conn->connect_error;
                    }
                ?>

                <div class=form>
                    <form action="produtosIncluir_Exe.php" method="POST" enctype="multipart/form-data">
                        <table class='w3-table-all'>
                            <tr><th colspan="2"><h1>Cadastre um Novo Produto</h1></th></tr>
                            <tr>
                                <td style="width: 50%;">
                                    <div>
                                        <label>Nome*</label>
                                        <input type="text" name="Nome" class="w3-input cadastro-input" required>
                                    </div>
                                    <div>
                                        <label>Preco*</label>
                                        <input type="text" name="Preco" class="w3-input cadastro-input" required>
                                    </div>
                                    <div>
                                        <label>Descrição</label>
                                        <input type="text" name="Descricao" class="w3-input cadastro-input">
                                    </div>
                                    <div>
                                        <label>Categoria</label>
                                        <select name="Categoria" class="w3-input cadastro-input">
                                            <option value="6"></option>
                                            <?php 
                                                foreach($opcoes_categoria as $key => $value) {
                                                    echo $value;
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <!-- Mensagem de erro no tamanho do arquivo -->
                                    <?php if ($erroTamanho != "") {?>
                                        <p class="w3-text-red"><?= $erroTamanho ?></p>
                                    <?php } ?>
                                </td>

                                <td>
                                    <div class="imagem-produto">
                                        <h2>Imagem do Produto</h2>
                                        <p><img id="imagemSelecionada" src="imagens/SemFoto.png" alt=""></p>
                                        <label class="w3-btn w3-theme botao-borda">
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
                                        <input type="submit" value="Criar Produto" class="w3-btn w3-theme cadastro-input">
                                        <a style="margin: 20px 5px;" href="produtosListar.php" class="w3-btn w3-theme botao-borda">Voltar</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
        </main>
    </div>

    <script src="js/ScriptLoja.js"></script>
</body>
</html>