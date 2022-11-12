<?php
  session_start();

if(!defined('DFFG574554FD')){
    header("Location: /");

}else{
    $url = explode("/",filter_input(INPUT_GET,'url',FILTER_DEFAULT));
    $dados = new DashboardController();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eduka - Portal Aluno</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>

            <main class="d-flex">
                <div class="">
                        
                </div>

                <div class="">
                        
                         <?php
                                
                                if(isset($_SESSION['dados'] )){
                                    $id = $_SESSION['dados']['id'];   
                                    
                                } 
                                $aluno = $dados->mostrarDadosAluno();

                                $_SESSION['aluno'] = $aluno;

                                // echo "ID: " . $id . "</br>";
                                echo "Nome: " .$aluno[0]."</br>";
                                echo "Curso: " .$aluno[1]  ."</br>";
                                echo "Turma: " .$aluno[2]  ."</br>";
                                echo "Código da turma:" .$aluno[3]  ."</br>";
                           

                                if($dados->mostrarDadosAluno()['situacao_id'] == "1"){
                                    echo "</br>Usuario Ativo</br>";
                                }

                                if($dados->mostrarDadosAluno()['nivelAcesso_id'] == "3"){
                                    echo "Aluno ";
                                }
                                                       //   var_dump($dados->mostrarDadosAluno());  
                        ?>
                    <a href="<?= DOMINIO ?>/aluno">Ver meus dados</a>

                </div>
            
            </main>
                
    </body>
    </html>
  <?php
}
