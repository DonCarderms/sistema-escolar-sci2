<?php
session_start();
if(isset($_SESSION['dados'])){
                
}else{
    header('Location: ' . DOMINIO);
   
}
$arr_url = explode("?",$_SERVER['REQUEST_URI']);
$arr_dados_cours = explode("&",$arr_url[1]);

if($_POST){
    // header('Location:' .DOMINIO.'/curso?id='.$dados[0].'&editar=true');
    $id = explode("=", $arr_dados_cours[0]);
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
    <title>Admin</title>
</head>
<body>
        <form action="" method="post">
                <?php

                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>

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
