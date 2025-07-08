<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $frutas = array("banana", "maçã", "uva");
        echo "<p>Minha Fruta = ". $frutas[1] . "</p>";

        $lista = "<ul>";
        for($i = 0; $i < count($frutas); $i++){
            $lista .= "<li>". $frutas[$i] . "</li>";
        }
        $lista .= "</ul>";

        echo $lista;
    ?>
</body>
</html>