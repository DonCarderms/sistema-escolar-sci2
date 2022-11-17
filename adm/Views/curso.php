<?php
session_start();
$arr_url = explode("?",$_SERVER['REQUEST_URI']);
$arr_dados_cours = explode("&",$arr_url[1]);

if($_POST){
    header('Location:' .DOMINIO.'/curso?id='.$dados[0].'&editar=true');
    $edit_cours = new CursoController();
    $edit_cours->editCours($_POST);
}

if($arr_dados_cours[1] == "editar=true"){
        $id = explode("=",$arr_dados_cours[0]);
        $cours = new CursoController();

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar curso</title>
        </head>
        <body>
            <div class="menu">
                menu
            </div>
            <div class="">
                <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
            </div>
            <form action="" method="post">
               <?php
                    foreach ($cours->showCours($id[1]) as $dados) {
                        ?>
                            <input type="hidden" name="id" value="<?= $dados[0] ?>">
                            <div>
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" value="<?= $dados[1] ?>">
                            </div>
                            <div>
                                <label for="data_inicio">Data de início</label>
                                <input type="date" name="data_inicio" id="data_inicio" value="<?= $dados[2] ?>">
                            </div>
                            <div>
                                <label for="data_final">DAta Final</label>
                                <input type="date" name="data_final" id="data_final" value="<?= $dados[3] ?>">
                            </div>
                            <div>
                                <button type="submit">Editar</button>
                            </div>

                        <?php
                    }
                ?>
            </form>
            <div>
                <a href="<?php echo DOMINIO . "/cursos"; ?>">Voltar</a>
            </div>
        </body>
        </html>
    <?php    
}



