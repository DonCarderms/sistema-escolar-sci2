<?php

class core {

            function index ($controller, $metodo, $parametro){
                $controllerFile = ucfirst($controller . "Controller");
                $caminho        = file_exists("/var/www/html/Controllers/".$controllerFile. ".php");
                    
                if($controller != ""){

                        if($caminho){
                           ;
                            if(class_exists($controllerFile)){
                               

                                if($metodo != ""){
                                   

                                    switch($metodo){
                                        case "editar":$metodo = "edit";
                                        break;
                                        case "excluir":$metodo = "delete";
                                        break;
                                        case "sair":$metodo = "sair";
                                        var_dump($metodo);
                                        break;
                                        default:
                                        include_once'/var/www/html/Views/error404.php';  


                                    }
                                    
                                    call_user_func_array(array(new $controllerFile, $metodo),$parametro);
                                    include_once "/var/www/html/Views/" . $controller . ".php";
                                                              
                                }
                              
                               
                                call_user_func_array(array(new $controllerFile, $metodo),$parametro);
                                    include_once "/var/www/html/Views/" . $controller . ".php";
                            
                            }else{
                                echo "não existe classe";
                            }
                        }else{
                            header('Location: ' . DOMINIO); 
                        }                         

                    }else{
                        include_once '/var/www/html/Views/login.php';
                    }
                    

                    
            }
}

if($methodo != ""){
    echo 'e tem methodo ';

    if($methodo != "adm"){
        header('Location:' . DOMINIO .'/Views/error404.php');
    }

    if($parametro){
    echo 'com parametros';
    }

} 