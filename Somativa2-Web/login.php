<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Somativa 2</title>
</head>
<body>
    <header>
        <?php 
            session_start();

            $mensagemErro = "";
            if(isset($_SESSION["falha-login"])) {
                $mensagemErro = $_SESSION["falha-login"];
                unset($_SESSION["falha-login"]);
            }

            require "geral/menu_login.php" 
        ?>
    </header>

    <main class="main-login">
        <div class="main-header">
            <h1>Cadastre-se ou Entre</h1>
        </div>

        <div class="contact-form">
            <div class="form-content">
                <div class="form-description">
                    <h1>Seja Bem vindo(a)!</h1>
                    <h2>Faça Login ou crie sua conta</h2>
                    <a href="./signup.php">Cadastre-se</a>
                </div>

                <div class="form-login">
                    <h1>Entrar</h1>

                    <form method="POST" action="./login_exe.php" class="login">
                        <div>
                            <input type="text" name="user" id="user" 
                            placeholder="Usuário" class="login-input" required>
                        </div><br>
                        <div class="senha-container">
                            <input type="password" name="password" class="login-input password" 
                            placeholder="Senha" required>

                            <span class="mostrar-senha" onclick="mostrarSenha()">
                                <i class="checkbox-senha fa-solid fa-eye-slash"></i>
                            </span>
                        </div><br>

                        <!-- Mensagem de erro -->
                        <p class="mensagem-erro w3-text-red"></p>

                        <!-- Script da mensagem -->
                        <?php if($mensagemErro != ""){ ?>
                            <script>
                                // Transforma em texto como parametro
                                erroLogin("<?= $mensagemErro ?>");
                            </script>
                        <?php }?>

                        <div class="lembrar-esquecer">
                            <div>
                                <input type="checkbox" name="lembrar" id="agree-term" class="agree-term"/>
                                <label for="lembrar" class=""><span>Lembrar este dispositivo</span></label>
                            </div>

                            <p><a href="#">Esqueceu a senha?</a></p>
                        </div>

                        <div class="form-button">
                            <input type="submit" class="form-submit" value="Enviar">
                        </div>
                    </form>

                </div>           
            </div>
        </div>
    </main>

</body>
</html>