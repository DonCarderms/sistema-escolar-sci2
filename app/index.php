<?php
  session_start();

define('DFFG574554FD', true);

$url = filter_input(INPUT_GET,'url',FILTER_DEFAULT);

$arr_url = explode("/", $url);

include_once 'autoload.php';
// //Core
include_once 'core/Core.php';

//Config
include_once 'config/config.php';

$controller     = $arr_url[0];
$metodo         = $arr_url[1];
$parametro      = $arr_url[2];

$index = new Core();
$index->index($controller, $metodo, $parametro);

if(isset($_POST)){
    // var_dump($_POST);
    
    $email = trim(filter_input(INPUT_POST,'email',FILTER_DEFAULT));
    $senha = trim(filter_input(INPUT_POST,'senha',FILTER_DEFAULT));

    if(!empty($email) && !empty($senha)){

        $index = new LoginController();

        if($index->logarAluno($email, $senha) == 1){
            header("Location: " . DOMINIO . "/dashboard");
        }else{
            header('Location: ' . DOMINIO);
           
        }  

    }else{
    // header('Location: ' . DOMINIO);
        
    }
       
}else{
    header('Location: ' . DOMINIO);
}



