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

        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
        }

        $id = $_GET["idUser"];
        $sql = "DELETE FROM Login WHERE ID_Usuario = $id";
        $result = $conn->query($sql);

        $url = rtrim(dirname($_SERVER['SCRIPT_NAME']),"/"); 

        if($result){
            header("location: $url/logout.php");
            exit();
        }
        else{
            $_SESSION["produtoExcluido"] = "erroExcluirConta";
            header("location: $url/produtosListar.php");
            exit();
        }
    ?>
</body>
</html>