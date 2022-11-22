<?php
session_start();



$arr_url = explode("?",$_SERVER['REQUEST_URI']);
$arr_dados_stud = explode("&",$arr_url[1]);


if($_POST){
    $edit_stud = new AlunoController();
    $edit_stud->editStud($_POST);
}

if($arr_dados_stud[1] == "editar=true"){
    $id = explode("=", $arr_dados_stud[0]);
    $_SESSION['id'] = $id[1];
    $stud = new AlunoController();
    
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
            <p class="t-center pt-10">
                    <?php if(isset($_SESSION['aluno_edit'])){ echo $_SESSION['aluno_edit'];unset($_SESSION['aluno_edit']);}else{unset($_SESSION['aluno_edit']);}?>
            </p>
            
         </div>

        <?php


            foreach($stud->showStudent($id[1])  as $dados){
                ?>
                    <form action="" method="post">
                        <div>      
                            <label for="nome">Nome aluno: </label>
                            <input type="text" name="nome" id="nome" value="<?=$dados[1]?>">
                        </div>
                        <div>
                            <label for="email">Email do aluno: </label>
                            <input type="email" name="email" id="email" value="<?=$dados[5]?>">
                        </div>
                        <div>
                            <label for="senha">nova Senha do aluno: </label>
                            <input type="text" name="senha" id="senha" value="">
                        </div>
                        <div>
                            <label for="cpf">cpf do aluno:</label>
                            <input type="text" name="cpf" id="cpf" value="<?=$dados[6]?>">
                        </div>
                        <div>
                            <label for="dataNascimento">Data de nascimento do aluno: </label>
                            <input type="date" name="dataNascimento" id="dataNascimento" value="<?=$dados[7]?>">
                        </div>
                        <div>
                            <p>Endereço do aluno</p>
                            <label for="rua">Rua: </label>
                            <input type="text" name="rua" id="rua" value="<?=$dados[8]?>">
                            <label for="numero">Numero: </label>
                            <input type="number" name="numero" id="numero" value="<?=$dados[9]?>">
                        </div>
                        <div>
                            <label for="submit"></label>
                            <input type="submit" name="editar" id="editar" value="Editar">
                        </div>
                    </form>
                <?php
            }

        ?>
        <div class="">
            <a href="<?= DOMINIO ?>/alunos">Voltar</a>
        </div>

    </body>
    </html>
    <?php
}else{
    header('Location: ' . DOMINIO);
    
}

