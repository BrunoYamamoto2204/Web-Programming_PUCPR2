<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Teste de PHP</title>
    <style>
        body { background-color: darkolivegreen; }

        p {  font-family: verdana;
             color: white;
             font-size: 16px; }
    </style>
</head>
<body>
    <?php
    // Variável x recebe uma String
    $x = "Linguagem PHP";
    // O ponto . concatena Strings
    echo "<p>A " . $x . " é show!</p>";

    // Variável x recebe a raiz quadrada de 144
    $x = sqrt(144);
    echo "<p>Raiz quadrada de 144 = " . $x . "</p>";

    // Variável aux recebe um valor boleano
    $aux = (5 * 4 > 36);
    if ($aux == true)
        echo "<p>(5 * 4 > 36) = Verdade</p>";
    else
        echo "<p>(5 * 4 > 36) = Falso</p>";
    ?>
</body>
</html>