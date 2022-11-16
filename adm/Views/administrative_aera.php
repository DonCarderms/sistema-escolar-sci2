<?php
session_start();

if(!defined('FBHTJ5Y7FDNG')){
    header('Location: ' . DOMINIO);

}else{

$adm = new Administrative_aeraController();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrative area</title>
    <link rel="stylesheet" href="<?= DOMINIO ?>/assets/css/style.css">
</head>
<body>
      <?php
            if(isset($_SESSION['dados'])){
                
            }else{
                header('Location: ' . DOMINIO);
            }

            $student = $adm->countStudent();
            $prof = $adm->countTeacher();
            $cours = $adm->countCourse();
            $team = $adm->countTeam();
         
            $url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            $arr_url = explode('/', $url);

            if($arr_url[1] == "sair"){
                $adm->sair();
            }    
        ?>

        <div>
           <div class="p-10"> <p><?= $student[0]  ?> alunos Cadastrados</p></div>
           <div class="p-10"><p><?= $prof[0]  ?> Professor(es) </p></div>
           <div class="p-10"><p><?= $cours[0]  ?> Cursos Disponiveis(s)</p></div>
           <div class="p-10"><p><?= $team[0]  ?> Turma(s)</p></div>
        </div>
        
       <div class="p-10">
            <div class="p-10"><a href="<?= DOMINIO ?>/cursos">Cursos</a></div>
            <div class="p-10"><a href="<?= DOMINIO ?>/alunos">Alunos</a></div>
            <div class="p-10"><a href="<?= DOMINIO ?>/turmas">Turmas</a></div>
            <div class="p-10"><a href="<?= DOMINIO ?>/professores">Professores</a></div>
       </div>
        
        
        

</body>
</html>
<?php
}