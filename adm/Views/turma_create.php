<?php
session_start();

if($_POST){
    $nome = trim(filter_input(INPUT_POST,'nome',FILTER_DEFAULT));
    $codigo = trim(filter_input(INPUT_POST,'codigo',FILTER_DEFAULT));
    $id_curso =  $_POST['cursos'];
    $newteam = new Turma_createController();
    $newteam->newTeam($nome, $codigo, $id_curso) ;
    
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

                if(isset($_SESSION['newteam'])){echo $_SESSION['newteam'];unset($_SESSION['newteam']);}else{unset($_SESSION['newteam']);}
                ?>
 
            </p>
        </div>
        <form action="" method="post">
               
                            <div>
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome">
                            </div>
                            <div>
                                <label for="codigo">Código da turma</label>
                                <input type="text" name="codigo" id="codigo">
                            </div>
                            <div>
                                <label for="cursos"></label>
                                <select class="input-style bg-primary" name="cursos" id="cursos">   
                                    <option value="0">Selecione um curso</option>            
                                    <?php
                                                    $cursos = new CursosController();
                                                    $cursos->listCours();
                                                    foreach($cursos->listCours() as $dados){
                                                        if($dados[1] !== "curso padrão"){
                                                        ?>
                                                            <option value="<?=$dados[0]?>" id="<?= $dados[0]?>"> <?=$dados[1]?> </option>
                                                        <?php
                                                        }
                                                    }
                                    ?>               
                            </select>
                            </div>
                            <div>
                                <button type="submit">Novo Turma</button>
                            </div>
        </form>
                 

        <div>
                <a href="<?php echo DOMINIO . "/turmas"; ?>">Voltar</a>
        </div>
</body>
</html>
