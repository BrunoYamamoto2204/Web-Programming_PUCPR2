<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        session_destroy();
        $url = rtrim(dirname($_SERVER['SCRIPT_NAME']),"/"); 
        header("location: $url/index.php");
        exit();
    ?>
</body>
</html>