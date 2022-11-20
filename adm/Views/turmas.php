<?php
session_start();

if(!defined('FBHTJ5Y7FDNG')){
    header('Location: ' . DOMINIO);

}else{
    $url = explode("/",filter_input(INPUT_GET,'url',FILTER_DEFAULT));
    $teams = new TurmasController();
    $teams->listTeams();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= DOMINIO ?>/assets/css/style.css">
    <title>Admin</title>
</head>
<body>
        <div class="">
            <a href="<?= DOMINIO ?>/turma_create">Nova Turma</a>
        </div>
        <div>
            <?php
                $arr_url = explode("?",$_SERVER['REQUEST_URI']);
                $arr_dados_teams = explode("&",$arr_url[1]);
                
                foreach ($teams->listTeams() as $dados) {
                    if($dados[1] !== "turma padrão"){
                        ?>           
                        <p>Turma: <?= $dados[1] ?> </p>
                        <p>Curso: <?= $dados[2] ?></p>
                        <p>Código da turma: <?= $dados[3] ?> </p>
                        <div>
                            <a href="<?= DOMINIO ?>/turma?id=<?= $dados[0] ?>&editar=true">Editar</a>
                            <a href="<?= DOMINIO ?>/turma_delete?id=<?= $dados[0] ?>&excluir=true">Excluir</a>
                        </div><br>
                        <?php
                    }
                
                }
            ?>
        </div>
        <br>
        <div class="">
            <a href="<?= DOMINIO ?>/administrative_aera">Voltar</a>
        </div>
</body>
</html>
<?php
}