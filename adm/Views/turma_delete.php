<?php
session_start();

$arr_url = explode("?",$_SERVER['REQUEST_URI']);
$arr_dados_cours = explode("&",$arr_url[1]);

if($arr_dados_cours[1] == "excluir=true"){
    $id = explode("=", $arr_dados_cours[0]);
    $delete_team = new Turma_deleteController();
    
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= DOMINIO ?>/assets/css/style.css">
        <title>Admin </title>
    </head>
    <body>

            <div class="">
                <?php            
                    $delete_team->deleteTeam(($id[1]));
                    // if(isset($_SESSION['turma_delete'])){echo $_SESSION['turma_delete'];unset($_SESSION['turma_delete']);}
                ?>
            </div>
            <div>
                <a href="<?php echo DOMINIO . "/turmas"; ?>">Voltar</a>
            </div>
    </body>
    </html>
<?php    
}
