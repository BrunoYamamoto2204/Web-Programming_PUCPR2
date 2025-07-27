
document.getElementById('celular').addEventListener('input', function(e) { // Captura os valres diretamente do input 
    let telefone = e.target.value;

    telefone = telefone.replace(/\D/g, ''); // Substitui valores não numéricos
    telefone = telefone.slice(0, 11); // Limita apenas 11 números para o telefone no input 

    if (telefone.length <= 10) {
        telefone = telefone.replace(/^(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3'); // Formatacao para número de 8 digitos + 2 DDD
    } else {
        telefone = telefone.replace(/^(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3'); // Formatacao para número de 9 digitos + 2 DDD
    }

    e.target.value = telefone; // Modifica diretamente o valor no input 
});

document.querySelector("form").addEventListener("submit", e => {
    e.preventDefault();

    const nome = document.getElementById("name").value
    const email = document.getElementById("email").value
    const celular = document.getElementById("celular").value
    const nascimento = document.getElementById("dt_nasc").value

    localStorage.setItem("resposta-nome", nome)
    localStorage.setItem("resposta-email", email)
    localStorage.setItem("resposta-celular", celular)
    localStorage.setItem("resposta-nascimento", nascimento)

    window.location.href = "formAction.html"
})