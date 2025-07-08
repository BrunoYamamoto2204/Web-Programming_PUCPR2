function openModal(cupcake) {
    var txt1 = document.getElementById("txt1");
    var txt2 = document.getElementById("txt2");
    var txt3 = document.getElementById("txt3");

  switch (cupcake) {
    case "CupFlavor1":
      txt1.innerHTML  = "Cookies And Cream";
      txt2.innerHTML  = "Creme de Negresco no bolo de chocolate.";
      txt3.innerHTML  = "R$15,00";
      break;

    case "CupFlavor2":
      txt1.innerHTML = "Morango com Chocolate";
      txt2.innerHTML = "Cobertura de morango com gotas de chocolate.";
      txt3.innerHTML = "R$14,00";
      break;

    case "CupFlavor3":
      txt1.innerHTML = "Limão Siciliano";
      txt2.innerHTML = "Cobertura azedinha com raspas de limão.";
      txt3.innerHTML = "R$13,00";
      break;

    case "CupFlavor4":
      txt1.innerHTML = "Brigadeiro";
      txt2.innerHTML = "Clássico brigadeiro brasileiro com granulado.";
      txt3.innerHTML = "R$12,00";
      break;

    case "CupFlavor5":
      txt1.innerHTML = "Red Velvet";
      txt2.innerHTML = "Bolo vermelho com cobertura de cream cheese.";
      txt3.innerHTML = "R$16,00";
      break;

    case "CupFlavor6":
      txt1.innerHTML = "Paçoca";
      txt2.innerHTML = "Sabor amendoim com cobertura crocante.";
      txt3.innerHTML = "R$14,50";
      break;

    default:
        txt1.innerHTML  = "Cookies And Cream";    
        txt2.innerHTML  = "Cookies And Cream";txt1.innerHTML  = "Delicioso cupkake.";
        txt3.innerHTML  = "R$15,00";
  }
  document.getElementById("knowMore").style.display = "inline-block";
}

function closeModal() {
  document.getElementById("knowMore").style.display = 'none';
}


document.querySelectorAll(".modalButton").forEach(button => {
    button.addEventListener("click", () => {
        const cupcake = button.name
        openModal(cupcake)
    })
})

document.getElementById("closeModalButton").addEventListener("click", () => {
    closeModal()
})