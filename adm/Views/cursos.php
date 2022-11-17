<?php
session_start();

if(!defined('FBHTJ5Y7FDNG')){
    header('Location: ' . DOMINIO);

}else{
    $url = explode("/",filter_input(INPUT_GET,'url',FILTER_DEFAULT));
    $cours = new CursosController();
    $cours->listCours();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
</head>
<body>
        <div class="">
            <a href="<?= DOMINIO ?>/curso_create">Novo Curso</a>
        </div>
        <?php
             $arr_url = explode("?",$_SERVER['REQUEST_URI']);
             $arr_dados_prod = explode("&",$arr_url[1]);

             foreach ($cours->listCours() as $dados) {
                if($dados[3] == null){
                    $dados[3] = "não especificado";
                }
                ?>           
                    <p>Curso: <?= $dados[1] ?> </p>
                    <p>Data de início: <?= $dados[2] ?></p>
                    <p>Data Final: <?= $dados[3] ?> </p>
                    <div>
                        <a href="<?= DOMINIO ?>/curso?id=<?= $dados[0] ?>&editar=true">Editar</a>
                        <a href="<?= DOMINIO ?>/curso_delete?id=<?= $dados[0] ?>&excluir=true">Excluir</a>
                    </div><br>
                <?php
             }
        ?>
        <br>
        <div class="">
            <a href="<?= DOMINIO ?>/administrative_aera">Voltar</a>
        </div>
</body>
</html>
<?php
}