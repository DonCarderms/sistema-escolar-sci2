<?php
session_start();

$arr_url = explode("?",$_SERVER['REQUEST_URI']);
$arr_dados_stud = explode("&",$arr_url[1]);

if($arr_dados_stud[1] == "excluir=true"){
    $id = explode("=",$arr_dados_stud[0]);
    $delete_stud = new Aluno_deleteController();
    $delete_stud->deleteStud($id[1]);

    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= DOMINIO ?>/assets/css/style.css">
        <title>Admin</title>
    </head>
    <body>
            <div>
                <p>
                    <?php
                        if (isset($_SESSION['aluno_delete'])){ echo $_SESSION['aluno_delete'];unset($_SESSION['aluno_delete']);}
                    ?>
                </p>
            </div>
            <div>
                     <a href="<?php echo DOMINIO . "/alunos"; ?>">Voltar</a>
            </div>
    </body>
    </html>








    <?php
    
}