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
        let tamanhoArquivo = input.files[0].size / 1024 / 1024

        if( tamanhoArquivo < 16) {
            let reader = new FileReader()

            reader.onload = e => document.querySelector("#imagemSelecionada").setAttribute("src", e.target.result)
            reader.readAsDataURL(input.files[0])
        }
        else{
            input.value = ""
            alert("O arquivo precisa ser uma imagem com menos de 16 MB");
        }
    }
}