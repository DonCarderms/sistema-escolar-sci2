<?php
  session_start();

if(!defined('DFFG574554FD')){
    header("Location: /");
}else{
    $url = explode("/",filter_input(INPUT_GET,'url',FILTER_DEFAULT));
    $ajuda = new AjudaController();
    $ajuda->ajuda();  
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
                        <ul class="nav-ul ">
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
                        <ul class="nav-ul active">
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
                <form class="form-ajuda font-30" action="" method="post">
                    <label for="ajuda"></label>
                    <textarea class="w-100" id="ajuda" name="ajuda" rows="20" cols="60" placeholder="dgite a sua dúvida"></textarea>
                    <br>
                    <input class="link  link-button-1 link-button-geral mb-50" type="submit" value="Enviar sua duvida"><br>
                    <a class="link-button-1 link-button-geral link" href="<?= DOMINIO . "/dashboard"?>"><i class="fa fa-arrow-left mr-20" aria-hidden="true"></i>Voltar</a>

                </form>
            
            </main>
           <script src="<?= DOMINIO ?>/assets/js/session-logout.js"></script>
                
    </body>
    </html>
  <?php
}
