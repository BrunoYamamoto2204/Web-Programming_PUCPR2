<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Somativa 2</title>
</head>
<body>
    <?php 
        session_start();
        require "bd/conectaBD.php";

        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error){
            die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
        }

        $id = $_POST["id"];
        $nome_produto = $_POST["nome"];

        $sql = "DELETE FROM Produto WHERE ID_Produto = $id";
        $result = $conn->query($sql);

        if($result){
            $url = rtrim(dirname($_SERVER['SCRIPT_NAME']),"/"); 

            $_SESSION["produtoExcluido"] = $nome_produto;
            header("location: $url/produtosListar.php");
            exit();
        }
        else{
            $_SESSION["produtoExcluido"] = "erroExcluirProduto";
            header("location: $url/produtosListar.php");
            exit();
        }

    ?>
</body>
</html>