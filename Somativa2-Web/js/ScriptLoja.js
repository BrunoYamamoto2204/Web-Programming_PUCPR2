function carregarImagem(input){
    let caminho = input.value

    if(caminho) {
        let indexArquivo = caminho.indexOf("\\") >= 0 ? caminho.lastIndexOf("\\") : caminho.lastIndexOf("/")
        let nomeArquivo = caminho.substring(indexArquivo)

        if (nomeArquivo.indexOf("/") === 0 || nomeArquivo.indexOf("\\") === 0){
            nomeArquivo = nomeArquivo.substring(1)
        }

        let extensao = nomeArquivo.indexOf(".") >= 1 ? nomeArquivo.split(".").pop() : ""

        if (extensao !== "gif" &&
            extensao !== "png" && 
            extensao !== "jpg" && 
            extensao !== "jpeg"  
        ){
            input.value = ""
            alert("É preciso selecionar um arquivo de imagem (gif, png, jpg ou jpeg)");
        }
    }
    else{
        input.value = ""
        alert("Selecione um caminho de arquivo válido");
    }

    if(input.files && input.files[0]) {
            let reader = new FileReader()

            reader.onload = e => document.querySelector("#imagemSelecionada").setAttribute("src", e.target.result)
            reader.readAsDataURL(input.files[0])
    }
}

// Aviso de erro no login (desaparece)
function erroLogin(mensagem){
    const mensagemErro = document.querySelector(".mensagem-erro");
    mensagemErro.style.display = "block"
    mensagemErro.innerHTML = mensagem;

    setTimeout(() => {
        mensagemErro.style.display = "none";
    }, 5000)
}

function mensagemExclusao(produto) {
    const divErro = document.querySelector(".aviso-exclusao");
    divErro.style.display = "block";
    
    let erro = "";
    if (produto === "erroExcluirProduto"){
        erro = "Erro ao excluir o produto! Tenta novamente";
    }
    else if (produto === "erroExcluirConta") {
        erro = "Erro ao excluir sua conta! Tenta novamente";
    }
    else{
        erro = `Produto <span class="destaque-nome">${produto}</span> removido com sucesso`;
    }

    divErro.innerHTML = erro;

    setTimeout(() => {
        divErro.style.display = "none";
    }, 5000);
}

function mostrarSenha(){
    const senha = document.querySelector(".password");
    const checkbox = document.querySelector(".checkbox-senha");

    if (checkbox.classList.contains("fa-eye-slash")){
        senha.type = "text"
        checkbox.classList.remove("fa-eye-slash");
        checkbox.classList.add("fa-eye");
    }
    else{
        senha.type = "password"
        checkbox.classList.remove("fa-eye");
        checkbox.classList.add("fa-eye-slash");
    }
}

function mostrarConfirmarSenha(){
    const senha = document.querySelector(".password-confirm");
    const checkbox = document.querySelector(".checkbox-senha-confirm");

    if (checkbox.classList.contains("fa-eye-slash")){
        senha.type = "text"
        checkbox.classList.remove("fa-eye-slash");
        checkbox.classList.add("fa-eye");
    }
    else{
        senha.type = "password"
        checkbox.classList.remove("fa-eye");
        checkbox.classList.add("fa-eye-slash");
    }
}

// Campo Senha igual a Confirmar Senha
document.addEventListener("DOMContentLoaded", function () {
    const password = document.querySelector(".password");
    const passwordConfirm = document.querySelector(".password-confirm");
    const erroSenhas = document.querySelector(".senha-diferente");
    
    passwordConfirm.addEventListener("input", function(e) {
        if(password.value != passwordConfirm.value){
            e.preventDefault();

            erroSenhas.innerHTML = "Os campos de Senha e Confirmar Senha devem ser iguais!";
            erroSenhas.style.display = "block";
        }
        else{
            erroSenhas.style.display = "none";
        }
    })
});