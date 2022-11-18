<?php
session_start();
if(isset($_SESSION['dados'])){
                
}else{
    header('Location: ' . DOMINIO);
   
}
if(!defined('FBHTJ5Y7FDNG')){
    header('Location: ' . DOMINIO);

}else{
    $url = explode("/",filter_input(INPUT_GET,'url',FILTER_DEFAULT));
    $stud = new AlunosController();
    $stud->listStudent();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
</head>
<body>
        <div class="">
            <a href="<?= DOMINIO ?>/aluno">Novo Aluno</a>
        </div>
        <?php
             $arr_url = explode("?",$_SERVER['REQUEST_URI']);
             $arr_dados_prod = explode("&",$arr_url[1]);

             foreach ($stud->listStudent() as $dados) {
               

                //   var_dump($dados); 
                ?>           
                        <p>Nome do Aluno: <?=  $dados[1] ?></p>
                        <p>Curso : <?=  $dados[2] ?></p>
                        <p>Turma: <?=  $dados[3] ?></p>
                        <p>Código da turma : <?=  $dados[4] ?></p>
                        <p>email: <?=  $dados[5] ?></p>
                        <p>cpf: <?=  $dados[6] ?></p>
                        <p>data de nascimento: <?=  $dados[7] ?></p>
                        <p>Endereço: <?=  $dados[8] ?>, <?=  $dados[9] ?></p>
                    <div>
                        <a href="<?= DOMINIO ?>/aluno?id=<?= $dados[0] ?>&editar=true">Editar</a>
                        <a href="<?= DOMINIO ?>/aluno_delete?id=<?= $dados[0] ?>&excluir=true">Excluir</a>
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