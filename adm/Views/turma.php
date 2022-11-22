<?php
session_start();
  
$arr_url = explode("?",$_SERVER['REQUEST_URI']);
$arr_dados_team = explode("&",$arr_url[1]);

if($_POST){;
    $edit_team = new TurmaController();
    $edit_team->editTeam($_POST);
}

if($arr_dados_team[1] == "editar=true"){
        $id = explode("=",$arr_dados_team[0]);
        $_SESSION['id_team'] = $id[1];
        $team = new TurmaController();
             
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

            <div class="">
                <?php
                   
                    if(isset($_SESSION['edit_team'])){echo $_SESSION['edit_team']; unset($_SESSION['edit_team']);}
                ?>
            </div>

            <form action="" method="post">
               
                                    <?php
                                        foreach( $team->thisTeam($id[1]) as $dado){
                                        }
                                    ?>
                            <div>
                                <label for="nome">Nome da Turma</label>
                                <input type="text" name="nome" id="nome" value="<?=$dado[0]?>">
                            </div>

                            <div>
                                <label for="cursos">Substituir curso</label>
                                <select class="input-style bg-primary" name="cursos" id="cursos">    
                                    <option value=""><?=$dado[1] ?></option>
                                    <?php
                                                    $cursos = new CursosController();
                                                    $cursos->listCours();
                                                    foreach($cursos->listCours() as $dados){
                                                        if($dados[1] !== "curso padrão" && $dados[1] !== $dado[1]){
                                                            ?>
                                                            <option value="<?=$dados[0]?>" id="<?= $dados[0]?>"> <?=$dados[1]?> </option>
                                                        <?php
                                                        }
                                                    }
                                     ?>               
                                 </select>
                            </div>
                            <div>
                                <button type="submit">Editar</button>
                            </div>
            </form>
                                                    
            <div>
                <a href="<?php echo DOMINIO . "/turmas"; ?>">Voltar</a>
            </div>
        </body>
        </html>
    <?php    
}else{
    header('Location:' .DOMINIO.'');    
}



