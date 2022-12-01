// detectar inatividade


let timer = setInterval(function(){ auto_logout() }, 5000); 
function reset_interval(){
  
    clearInterval(timer);
          
    timer = setInterval(function(){ auto_logout() }, 5000);
        
}

function auto_logout(){

        window.location="http://localhost:8001/dashboard/sair";
                
}
