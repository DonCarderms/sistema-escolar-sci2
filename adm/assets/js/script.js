// gerar código da turma
let codigoTurma = document.getElementById("codigo")
let gerarCodigo = () => {
    const letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    let codigo = [];
   cont = 0
   while(cont < 10){
     codigo[cont] = letters[parseInt(Math.random() * 35)];  
     cont++
   }
 return codigoTurma.value =  codigo.join('') ;    
}
gerarCodigo();


// formatar cpf

let cpf_aluno = document.getElementsByClassName("cpf-aluno")

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



