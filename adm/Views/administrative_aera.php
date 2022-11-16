<?php
session_start();

if(!defined('FBHTJ5Y7FDNG')){
    header('Location: ' . DOMINIO);

}else{

$adm = new Administrative_aeraController();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrative area</title>
</head>
<body>
      <?php
            if(isset($_SESSION['dados'])){
                var_dump($_SESSION['dados']);
                unset($_SESSION['dados']);
            }

            $url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

            $arr_url = explode('/', $url);
            if($arr_url[1] == "editar"){
                $adm->edit();
                include_once '/var/www/html/Views/editar.php';
            }elseif($arr_url[1] == "sair"){
                $adm->sair();
            }
            
            var_dump($editar);
        ?>

        hjkhjlkj
</body>
</html>
<?php
}