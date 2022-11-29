// formatra cpf do aluno

let cpf_aluno = document.getElementById("cpf-aluno")


let cont = 0, caracteres = 0
let cpf = []
for (const index in cpf_aluno.innerHTML) {       
    if(caracteres >= 7){
       cpf[cont] = cpf_aluno.innerHTML[index]
        cont++;
    }
    caracteres++;
}

let cpf_formated = cpf.join('')


function formataCPF(cpf_formated){
  //retira os caracteres indesejados...
  cpf_formated = cpf_formated.replace(/[^\d]/g, "");
  
  //realizar a formatação...
    return cpf_formated.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
}

cpf_aluno.innerHTML = "CPF: " + formataCPF(cpf_formated);



// let nav_text = document.getElementById("nav-text");
// let showUlText = (navbar)  =>{ 
//     setInterval(function(){
//         nav_text.style.display = "block";  
//     }, 1000)
         
// }



// let removeULText = () => nav_text.style.display = "none";


// let button = document.getElementById("fa-mh")

// alert(button);
// ​
// button.addEventListener("click", function(event){
//         console.log(event.target);
//     alert('O elemento clicado foi o ' + e.target.innerHTML);
// });



