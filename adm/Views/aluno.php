<?php
session_start();

$arr_url = explode("?",$_SERVER['REQUEST_URI']);
$arr_dados_stud = explode("&",$arr_url[1]);


if($_POST){
    var_dump($_POST);
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
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css"/>
        <link rel="shortcut icon" href="../assets/images/logo-sci.png" type="image/x-icon">

        <title>Admin</title>
    </head>
    <body class="d-flex" onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()">

    <nav class=" d-flex align-items-center flex_column nav-principal-vertical" id="nav-bar ">
                    <span class="close-menu cm-1"></span>
                    <span class="close-menu cm-2"></span> 
                    <div class="w-100 menu-hamburger d-flex flex_column mt-10">
                        <i id="fa-mh" class="fa fa-2x fa-bars " aria-hidden="true"></i>
                        <span class="menu-hamburger-span"></span>
                        <span class="menu-hamburger-span"></span>
                        <span class="menu-hamburger-span"></span>
                    </div>      
             <div class="w-100 div-ul">
                    <div>
                       <ul class="nav-ul">
                            <li class="nav-ul-li">
                            <a class="link nav-ul-link d-flex" href="<?= DOMINIO ?>/administrative_aera">
                                <span class="nav-ul-link-icon mt-10">
                                    <i class="color_light fa fa-home fa-2x" aria-hidden="true"></i>                       
                                </span>
                                <span class="nav-text" id="nav-text">
                                   Inicio
                                </span> 
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="nav-ul ">
                            <li class="nav-ul-li">
                                <a class="link nav-ul-link d-flex"  href="<?= DOMINIO ?>/cursos">
                                    <span class="nav-ul-link-icon mt-10">
                                         <i class="color_light fa fa-graduation-cap fa-2x" aria-hidden="true"></i>                                 
                                    </span>
                                     <span class="nav-text" id="nav-text">
                                        Cursos
                                     </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="nav-ul active">
                            <li class="nav-ul-li">
                                <a class="link nav-ul-link d-flex"  href="<?= DOMINIO ?>/alunos">
                                    <span class="nav-ul-link-icon mt-10">
                                        <i class="color_light fa fa-user-circle fa-2x" aria-hidden="true"></i>                      
                                    </span>
                                     <span class="nav-text" id="nav-text">
                                        Alunos
                                     </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="nav-ul">
                            <li class="nav-ul-li">        
                                <a class="link nav-ul-link d-flex"  href="<?= DOMINIO ?>/turmas">
                                    <span class="nav-ul-link-icon mt-10">
                                    <i class="color_light fa  fa-users fa-2x" aria-hidden="true"></i>                      
                                    </span>
                                     <span class="nav-text" id="nav-text">
                                        Turmas
                                     </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="nav-ul">
                            <li class="nav-ul-li">
                                
                                <!-- <a class="link nav-ul-link d-flex"  href="<?= DOMINIO ?>/professores">
                                    Professores
                                </a> -->
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="nav-ul">
                            <li class="nav-ul-li">
                                <a class="link nav-ul-link d-flex" href="<?= DOMINIO . '/administrative_aera/sair' ?>">
                                    <span class="nav-ul-link-icon mt-10">
                                        <i class="color_light fa fa-sign-out fa-2x" aria-hidden="true"></i>                      
                                        </span>                               
                                        <span class="nav-text" id="nav-text"> 
                                            Sair
                                        </span>   
                                    </a> 
                                </li>
                            </ul>
                    </div>
                </div>
                
            </nav>
            <p class="nome_aluno">
                <img width="30" src="../assets/images/icon-admin.svg" alt="admin">
                <span >Administrador</span>
            </p>
            <main class="w-100 d-flex flex_column align-items-center align-content-center justify-content-center">
            <?php


                foreach($stud->showStudent($id[1])  as $dados){
                    ?>
                    <div>

                        <form action="" method="post">
                            <div>      
                                <label for="nome"></label>
                                <input class="input-style w-100"  type="text" name="nome" id="nome" value="<?=$dados[1]?>" placeholder="Nome aluno">
                            </div>
                            <div>
                                <label for="email"></label>
                                <input class="input-style w-100"  type="email" name="email" id="email" value="<?=$dados[5]?>" placeholder="Email do aluno">
                            </div>
                            <div>
                                <label for="senha"></label>
                                <input class="input-style w-100"  type="text" name="senha" id="senha" value="" placeholder="nova Senha do aluno">
                            </div>
                            <div>
                                <label for="cpf"></label>
                                <input class="input-style w-100"  type="text" name="cpf" id="cpf" value="<?=$dados[6]?>" placeholder="cpf do aluno">
                            </div>
                            <div>
                                <label for="dataNascimento">Data de nascimento do aluno</label>
                                <input class="input-style w-100"  type="date" name="dataNascimento" id="dataNascimento" value="<?=$dados[7]?>">
                            </div>
                            <div>
                                <label for="rua"></label>
                                <input class="input-style w-100"  type="text" name="rua" id="rua" value="<?=$dados[8]?>" placeholder="Endereço">
                                <label for="numero"></label>
                                <input class="input-style w-100"  type="number" name="numero" id="numero" value="<?=$dados[9]?>" placeholder="Numero">
                            </div>
                            <div>
                                <label for="curso">Mudar de curso</label>
                                <select class="input-style bg-primary" name="curso" id="curso">   
                                        <?php                             
                                                $courStud = new AlunoController();
                                            foreach($courStud->showStudent($id[1]) as $dadoStud){
                                                    
                                                    ?>
                                                        <option value="<?=$dadoStud[12]?>" id="<?=$dadoStud[12]?>"><?=$dadoStud[2]?></option>         
                                                    <?php
                                            }
                                                
                                        ?>
                                       
                                        <?php
                                                        $cursos = new CursosController();
                                                        $cursos->listCours();
                                                        foreach($cursos->listCours() as $dados){
                                                            if($dados[1] !== "curso padrão" && $dados[1] !==$dadoStud[2]){
                                                            ?>
                                                                <option value="<?=$dados[0]?>" id="<?= $dados[0]?>"> <?=$dados[1]?> </option>
                                                            <?php
                                                            }
                                                        }
                                        ?>               
                                </select>
                            </div>
                            <div>
                                <label for="turma">Mudar de turma</label>
                                <select class="input-style bg-primary" name="turma" id="turma">   
                                        <?php                             
                                                $courStud = new AlunoController();
                                            foreach($courStud->showStudent($id[1]) as $dadoStud){
                                                    
                                                    ?>
                                                        <option value="<?=$dadoStud[13]?>" id="<?=$dadoStud[13]?>"><?=$dadoStud[3]?></option>         
                                                    <?php
                                            }
                                                
                                        ?>           
                                        <?php
                                                        $teams = new TurmasController();
                                                        $teams->listTeams();
                                                        foreach($teams->listTeams() as $dados){
                                                            if($dados[1] !== "turma padrão" && $dados[1] !==$dadoStud[3]){
                                                                    ?>
                                                                        <option value="<?=$dados[0]?>" id="<?= $dados[0]?>"> <?=$dados[1]?> </option>
                                                                    <?php
                                                                
                                                            }
                                                        }
                                        ?>               
                                </select>
                            </div>

                            <div class="t-center ">
                                <label for="submit"></label>
                                <input class="bt link-button-1 link-button-geral link"     type="submit" name="editar" id="editar" value="Editar">
                            </div>
                        </form>
                    </div>
                    <?php
                }

            ?>
            <div class="mt-100">
                <a class="link-button-1 link-button-geral link"  href="<?= DOMINIO ?>/alunos">
                     <i class="fa fa-arrow-left mr-20" aria-hidden="true"></i>
                    Voltar
                </a>
            </div>
        </main>
        <script src="<?= DOMINIO ?>/assets/js/session-logout.js"></script>
    </body>
    </html>
    <?php
}else{
    header('Location: ' . DOMINIO);
    
}

