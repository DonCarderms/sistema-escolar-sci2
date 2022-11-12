<?php
  session_start();

if(!defined('DFFG574554FD')){
    header("Location: /");

}else{
    $url = explode("/",filter_input(INPUT_GET,'url',FILTER_DEFAULT));
    $dados = new AlunoController();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eduka</title>
        <link rel="stylesheet" href="<?= DOMINIO ?>/assets/css/style.css">
    </head>
    <body>

            <main>
                <div class="">

                </div>

                <div class="conteudo">                
                    <?php

                    
                            if(isset($_SESSION['aluno'] )){
                                $aluno = $_SESSION['aluno'];                                
                            } 


                            echo "Nome: " .$aluno[0]."</br>";
                            echo "Curso: " .$aluno[1]  ."</br>";
                            echo "Turma: " .$aluno[2]  ."</br>";
                            echo "ICódigo da turma:" .$aluno[3]  ."</br>";
                            echo "email: " .$aluno[4]  ."</br>";
                            echo "Cpf:" .$aluno[5]  ."</br>";
                            echo "Data de nascimento:" .$aluno[6]  ."</br>";
                            echo "Endereço : rua " .$aluno[7]  .", ";
                            echo "n ° " .$aluno[8]  ."</br>";

                            if(isset($_SESSION['dados'] )){
                                $dados = $_SESSION['dados'];                                
                            } 
                            // var_dump($dados);
                            echo "<a href='" . DOMINIO . "/aluno/editar?id=" . $dados['id'] . "&editar=true'>Editar meus dados</a>";

                           
                            // $arr_url = explode("?",$_SERVER['REQUEST_URI']);
                            // // // var_dump($arr_url);
                            // // echo "<hr>";
                            // $arr_dados_prod = explode("&",$arr_url[1]);
                            // var_dump($arr_dados_prod[1]);

                            // if($arr_dados_prod[1] == "editar=true"){

                            //     include_once '/var/www/html/Views/editarAluno.php';                             
                            // }

                    //   var_dump($dados);  
                 ?>    

                        <!-- <a href="http:">Editar</a> -->
                </div>
            
            </main>
                
    </body>
    </html>
  <?php
}
