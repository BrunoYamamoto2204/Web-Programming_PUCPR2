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
            <h1>Novo Produto</h1>

            <div class="main-content">
                <?php
                    $conn = new mysqli($servername, $username, $password, $database);
                    
                    if($conn->connect_error) {
                        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
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
                                        <input type="text" name="Nome" class="w3-input " required>
                                    </div>
                                    <div>
                                        <label>Preco*</label>
                                        <input type="text" name="Preco" class="w3-input " required>
                                    </div>
                                    <div>
                                        <label>Categoria</label>
                                        <input type="text" name="Categoria" class="w3-input">
                                    </div>
                                    <div>
                                        <label>Descrição</label>
                                        <select name="Descricao" class="w3-input">
                                            <option value=""></option>
                                            <option value="Teclado">Teclado</option>
                                            <option value="Mouse">Mouse</option>
                                            <option value="Monitor">Monitor</option>
                                            <option value="Computador">Computador</option>
                                            <option value="Laptop">Laptop</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="imagem-produto">
                                        <h2>Imagem do Produto</h2>
                                        <p><img id="imagemSelecionada" src="imagens/SemFoto.png" alt=""></p>
                                        <label class="w3-btn w3-theme">
                                            Selecione uma Imagem
                                            <input type="file" name="Foto" accept="image/*" onchange="carregarImagem(this);" style="display: none;">
                                        </label>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <div class="enviarCancelar">
                                        <input type="submit" value="Criar Produto" class="w3-btn w3-theme">
                                        <button type="reset" class="w3-btn w3-theme botao-cancelar">Limpar</button>
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