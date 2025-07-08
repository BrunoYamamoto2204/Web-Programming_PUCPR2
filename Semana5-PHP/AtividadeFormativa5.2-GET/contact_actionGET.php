<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout/index.css">
    <link rel="stylesheet" href="layout/contact.css">
    <title>Document</title>
</head>

<body>
    <?php
        $nome = $_GET["name"];       // obtém dado do form e atribui a variável
        $email = $_GET ["email"];      // obtém dado do form e atribui a variável
        $celular = $_GET ["celular"];    // obtém dado do form e atribui a variável
        $agree = $_GET ["agree-term"]; // obtém dado do form e atribui a variável
        $data = $_GET["dt_nasc"];    // obtém dado do form e atribui a variável

        list($ano, $mes, $dia) = explode('-', $data);  // Separa ano, mês e dia de $data
        $aniversario = $dia . '/' . $mes . '/' . $ano; // Formata data: dia, mês e ano

        // Cria data atual
        $hoje = mktime(0,0,0, date("m"), date("d"), date("Y"));

        // Descobre a unix timestamp da data de nascimento da pessoa
        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
    ?>

    <div class="sidebar">
        <a href="index.html">Home</a>
        <a href="news.html">News</a>
        <a class="active" href="contact.html">Contact</a>
        <a href="about.html">About</a>
    </div>

    <p class="texto"><strong>PHP</strong> recebe os dados enviados via <strong>GET</strong> de um form HTML</p>

    <table class="tableCSS">
        <tr>
            <th>CAMPO</th>
            <th>VALOR</th>
        </tr>
        <tr>
            <th>Nome</th>
            <td><?php echo $nome; ?></td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <th>Celular</th>
            <td><?php echo $celular; ?></td>
        </tr>
        <tr>
            <th>Aniversário</th>
            <td><?php echo $aniversario; ?></td>
        </tr>
        <tr>
            <th>Idade</th>
            <td><?php echo $idade; ?></td>
        </tr>
        <tr>
            <th>Concorda Form?</th>
            <td><?php echo $agree; ?></td>
        </tr>
    </table>

    <div class="voltar-container">
    <a href="contact_GET.html" class="btn-voltar">Voltar para o formulário</a>
    </div>    
</body>
</html>