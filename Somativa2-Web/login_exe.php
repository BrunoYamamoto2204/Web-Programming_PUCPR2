<!DOCTYPE html>
<html lang="pt-br">
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

        $usuario = $_POST["user"];
        $senha = $_POST["password"];

        $sql = "SELECT * FROM Login 
                WHERE User = '$usuario' AND Senha = md5('$senha')";
        $result = $conn->query($sql);

        if($result){
            $url = rtrim(dirname($_SERVER['SCRIPT_NAME']),"/"); 

            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $_SESSION["login"] = $usuario;
                $_SESSION["nome"] = $row["Nome"];
                $_SESSION["id"] = $row["ID_Usuario"];
                header("location: $url/produtosListar.php");
            }
            else{
                $_SESSION["falha-login"] = "Usuário ou Senha inválidos";
                header("location: $url/login.php");
            }
        }
        else{
            echo "Erro ao acessar o BD: " . mysqli_error($conn);
        }

    ?>

    <script src="js/ScriptLoja.js"></script>
</body>
</html>