<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Somativa 2</title>
</head>
<body>
    <header>
        <?php require "geral/menu_login.php" ?>
    </header>

    <main>
        <div class="form-signup">
            <h1>Criar Conta</h1>
            <h3>Preencha os dados abaixo para aproveitar todos os recursos </h3>


            <form method="POST" action="./signup_exe.php" class="signup">
                <div>
                    <label for="name" class="signup-label">Nome Completo:</label>
                    <input type="text" name="name" id="name" placeholder="Seu Nome" class="signup-input">
                </div><br>
                <div>
                    <label for="celular" class="signup-label">Celular:</label>
                    <input type="tel" name="celular" id="celular" placeholder="(XX) XXXXX-XXXX" 
                            pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" class="signup-input" title="(XX)XXXXX-XXXX">
                </div><br>
                <div>
                    <label for="email" class="signup-label">E-mail*:</label>
                    <input type="email" name="email" id="email" placeholder="Seu Email" class="signup-input" required >
                </div><br>
                <div>
                    <label for="user" class="signup-label">Usuário*:</label>
                    <input type="text" name="user" id="user" class="signup-input"
                            placeholder="Seu Usuário" required>
                </div><br>

                <label for="password" class="signup-label">Senha*:</label>
                <div class="senha-container-signup">
                    <input type="password" name="password" class="signup-input password" placeholder="Sua Senha" 
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" 
                             title="A senha deve conter pelo menos: 1 número, 1 letra maiúscula
                            ,1 letra minúscula, Entre 6 a 8 caracteres"
                            required>
                    <span class="mostrar-senha-signup" onclick="mostrarSenha()">
                        <i class="checkbox-senha fa-solid fa-eye-slash"></i>
                    </span>
                </div><br>

                <label for="password-confirm" class="signup-label">Confirmar Senha*:</label>
                <div class="senha-container-signup">
                    <input type="password" name="password-confirm" class="signup-input password-confirm" placeholder="Confirmar sua senha" 
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" 
                            title="A senha deve conter pelo menos: 1 número, 1 letra maiúscula
                            ,1 letra minúscula, Entre 6 a 8 caracteres"
                            required>
                    <span class="mostrar-senha-signup" onclick="mostrarConfirmarSenha()">
                        <i class="checkbox-senha-confirm fa-solid fa-eye-slash"></i>
                    </span>
                </div><br>

                <p class="senha-diferente w3-text-red" style="display: none"></p>

                <div class="termo">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>Eu concordo com os <a href="#" class="term-service">termos de serviço</a></label>
                </div><br>

                <div class="signup-botoes">
                    <input type="submit" class="signup-button" value="Enviar">
                    <button class="signup-button" onclick="history.back()">Voltar</button>                
                </div>
            </form>
        </div>
        
    </div>

</body>
</html>