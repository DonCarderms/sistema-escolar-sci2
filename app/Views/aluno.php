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
        <title>Academia Sci</title>
        <link rel="stylesheet" href="<?= DOMINIO ?>/assets/css/style.css">
        <link rel="stylesheet" href="<?= DOMINIO ?>//assets/css/font-awesome.min.css"/>
        <link rel="shortcut icon" href="../assets/images/logo-sci.png" type="image/x-icon">
    </head>
    <body class="d-flex">
    <nav class=" d-flex align-items-center flex_column nav-principal-vertical" id="nav-bar" onmouseover="showUlText();" onmouseout="removeULText();">
                    <span class="close-menu cm-1"></span>
                    <span class="close-menu cm-2"></span>
                    <div class="w-100 menu-hamburger d-flex flex_column mt-10">
                        <i id="fa-mh" class="fa fa-2x fa-bars " aria-hidden="true"></i>
                        <span class="menu-hamburger-span"></span>
                        <span class="menu-hamburger-span"></span>
                        <span class="menu-hamburger-span"></span>
                    </div>
                    <div class="w-100 div-ul">
                        <ul class="nav-ul">
                            <li class="nav-ul-li">
                            <a class="link nav-ul-link d-flex" href="<?= DOMINIO ?>/dashboard">
                                <span class="nav-ul-link-icon mt-10">
                                    <i class="color_light fa fa-home fa-2x" aria-hidden="true"></i>                       
                                </span>
                                <span class="nav-text" id="nav-text">
                                   Inicio
                                </span> 
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-ul active">
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
                            <a class="link nav-ul-link d-flex" href="<?=DOMINIO?>/ajuda">
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
                    <span class="link-lidbn">
                        <a class="link nav-text link-don" target="_blank" href="https://www.linkedin.com/in/doncarderms/">Desenvolvida por Doncarderms</a>
                    </span>
                    
            </nav>
            <p class="nome_aluno">
            <i class="fa fa-user-circle fa-2x mg-10 user-icon" aria-hidden="true"></i>
                <?php
                    
                    if(isset($_SESSION['dados'] )){
                        $id = $_SESSION['dados']['id'];   
                        
                    }
                    $dados = new DashboardController();
                        
                    $aluno = $dados->mostrarDadosAluno();
                    
                    echo $aluno['nome'];
                ?>
            </p>
            <main class="w-100 d-flex flex_column_reverse align-items-center align-content-center justify-content-space-around">
                    
                    <div class="conteudo-aluno w-100 d-flex  align-items-center flex_column font-size-2">    
                        <div class="">

                            <?php     
                                if(isset($_SESSION['aluno'] )){
                                    $aluno = $_SESSION['aluno'];                              
                                } 
                                
                                if(isset($_SESSION['dados'] )){
                                    $dados = $_SESSION['dados'];                                
                                } 
                                        
                                 $arr_url = explode("?",$_SERVER['REQUEST_URI']);
                                 $arr_dados_prod = explode("&",$arr_url[1]);
    
                                ?>
                                    <p >Nome:   <?= $aluno[0]  ?></p>
                  
                                    <p >Curso:   <?= $aluno[1]  ?></p>
         
                                    <p >Turma:   <?= $aluno[4]  ?></p>
    <!--  
                                    <p >Código da turma:   <?= $aluno[5]  ?></p> -->
                               
                                    <p >email:   <?= $aluno[6]  ?></p>
                               
                                    <p id="cpf-aluno">CPF:   <?= $aluno[7]  ?></p>
                               
                                    <p >Data de nascimento:   <?= date('d / m / Y', strtotime($aluno[8]))  ?></p>
                               
                                    <p class=" mb-50">Endereço : rua    <?= $aluno[9]  ?>, numero <?= $aluno[10]?></p>  
                               
                                    <a class="link  link-button-1 link-button-geral" href="<?= DOMINIO ?>/aluno/editar?id=<?= $dados['id'] ?>&editar=true"><i class="fa fa-pencil-square-o icon-action mr-20" aria-hidden="true"></i> Editar meus dados</a>     
                                    <a class="link-button-1 link-button-geral link" href="<?= DOMINIO . "/dashboard"?>"><i class="fa fa-arrow-left mr-20" aria-hidden="true"></i>Voltar</a>
                        </div>             

                            <?php
                            
                            if($arr_dados_prod[1] == "editar=true"){
                                include_once '/var/www/html/Views/editarAluno.php';                             
                            }

                 ?>    
                                          
            </main>
            <script src="<?= DOMINIO ?>/assets/js/script.js"></script>  
    </body>
    </html>
  <?php
}
