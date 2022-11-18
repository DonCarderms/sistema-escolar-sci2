<?php
session_start();

if($_POST){
    $newcours = new Curso_createController();
    $newcours->newCours($_POST);
}
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

                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
 
            </p>
        </div>
        <form action="" method="post">
               
                            <div>
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome">
                            </div>
                            <div>
                                <label for="dataInicio">Data de início</label>
                                <input type="date" name="dataInicio" id="dataInicio">
                            </div>
                            <div>
                                <label for="dataFinal">DAta Final</label>
                                <input type="date" name="dataFinal" id="dataFinal">
                            </div>
                            <div>          
                            <div>
                                <button type="submit">Novo curso</button>
                            </div>
        </form>
        <div>
                <a href="<?php echo DOMINIO . "/cursos"; ?>">Voltar</a>
        </div>
</body>
</html>
