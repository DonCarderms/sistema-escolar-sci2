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
        <title>Eduk - Portal Aluno</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css"/>
    </head>
    <body class="d-flex">
            <nav class=" d-flex align-items-center flex_column nav-principal-vertical" id="nav-bar" onmouseover="showUlText();" onmouseout="removeULText();">
                    <div class="w-100 menu-hamburger d-flex flex_column mt-10">
                        <span class="menu-hamburger-span"></span>
                        <span class="menu-hamburger-span"></span>
                        <span class="menu-hamburger-span"></span>
                    </div>
                    <div class="w-100">
                        <ul class="nav-ul">
                            <li class="nav-ul-li">
                            <a class="link nav-ul-link d-flex" href="<?= DOMINIO ?>/aluno">
                                <span class="nav-ul-link-icon mt-10">
                                    <i class="color_light fa fa-user-circle fa-2x" aria-hidden="true"></i>                      
                                </span>
                                <span class="nav-text" id="nav-text">
                                   Minha conta
                                </span> 
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-ul">
                            <li class="nav-ul-li">
                            <a class="link nav-ul-link d-flex" href="#">
                                <span class="nav-ul-link-icon mt-10">
                                     <i class="color_light fa fa-graduation-cap fa-2x" aria-hidden="true"></i>                 
                                </span>
                                <span class="nav-text" id="nav-text">
                                   Aulas
                                </span> 
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-ul">
                            <li class="nav-ul-li">
                            <a class="link nav-ul-link d-flex" href="#">
                                <span class="nav-ul-link-icon mt-10">
                                    <i class="color_light fa fa-question-circle fa-2x" aria-hidden="true"></i>                                                                     
                                </span>
                                <span class="nav-text" id="nav-text">
                                   Ajuda
                                </span> 
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-ul">
                            <li class="nav-ul-li">
                            <a class="link nav-ul-link d-flex" href="../">
                                <span class="nav-ul-link-icon">
                                    <i class="color_light fa  fa-sign-out fa-2x" aria-hidden="true"></i>                      
                                </span>
                                <span class="nav-text" id="nav-text">sair</span> 
                            </a>
                            </li>
                        </ul>
                                
                    </div>
                    <span>
                        <a class="link nav-text link-don" target="_blank" href="https://www.linkedin.com/in/doncarderms/">Desenvolvida por Doncarderms</a>
                    </span>
                    
            </nav>
            <p class="nome_aluno">
            <i class="fa fa-user-circle fa-2x mg-10 user-icon" aria-hidden="true"></i>
                <?php
                    if(isset($_SESSION['dados'] )){
                        $id = $_SESSION['dados']['id'];   
                        
                    } 
                    $aluno = $dados->mostrarDadosAluno();
                    echo $aluno['nome'];
                ?>
            </p>
            <main class="w-100 d-flex flex_column_reverse align-items-center align-content-center justify-content-space-around">
                <div class="p-a">
                    <img width="400" src="<?= DOMINIO?>/assets/images/logo.svg" alt="">
                </div>
               
                <div class="contenu d-flex justify-content-space-around">
                        
                         <?php
                                
                                if(isset($_SESSION['dados'] )){
                                    $id = $_SESSION['dados']['id'];   
                                    
                                }
                                if($aluno == null){
                                    header('Location: ' . DOMINIO);                    

                                } 
                                $aluno = $dados->mostrarDadosAluno();

                                $_SESSION['aluno'] = $aluno;
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
                </div>
            
            </main>
            <script src="<?= DOMINIO ?>/assets/js/script.js"></script>
    </body>
    </html>
  <?php
}
