<?php
define('FBHTJ5Y7FDNG', true);

$url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

$arr_url = explode('/', $url);

//core
include_once 'core/Core.php';

//config
include_once 'config/config.php';

//autoload
include_once 'autoload.php';


$controller = $arr_url[0];
$metodo = $arr_url[1];
$parametro = $arr_url[2];

$index = new core();
$index->index($controller, $metodo, $parametro);

if(isset($_POST)){   
    $email = trim(filter_input(INPUT_POST,'email',FILTER_DEFAULT));
    $senha = trim(filter_input(INPUT_POST,'senha',FILTER_DEFAULT));

    if(!empty($email) && !empty($senha)){
        $index = new LoginController();

        if($index->loginAdm($email, $senha) == 1){
            echo "cheguei aqui";
            header('Location:' . DOMINIO .'/administrative_aera');
        }else{
            header('Location: ' . DOMINIO);
           
        }  

    }

    // header('Location:' . DOMINIO .'/adm');
}else{
    header('Location: ' . DOMINIO);
}


