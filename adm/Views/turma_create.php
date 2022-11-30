<?php
session_start();

if($_POST){
    $nome = trim(filter_input(INPUT_POST,'nome',FILTER_DEFAULT));
    $codigo = trim(filter_input(INPUT_POST,'codigo',FILTER_DEFAULT));
    $id_curso =  $_POST['cursos'];
    $newteam = new Turma_createController();
    $newteam->newTeam($nome, $codigo, $id_curso) ;
    
}
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
<body class="d-flex">
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
                        <ul class="nav-ul">
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
                        <ul class="nav-ul active">
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

            <form action="" method="post">
                   
                                <div>
                                    <label for="nome"></label>
                                    <input class="input-style width-100"  type="text" name="nome" id="nome" placeholder="nome da turma">
                                </div>
                                <div>
                                    <label for="codigo"></label>
                                    <input class="input-style width-100"  type="hidden" name="codigo" id="codigo">
                                </div>
                                <div>
                                    <label for="cursos"></label>
                                    <select class="input-style bg-primary" name="cursos" id="cursos">   
                                        <option value="0">Selecione um curso</option>            
                                        <?php
                                                        $cursos = new CursosController();
                                                        $cursos->listCours();
                                                        foreach($cursos->listCours() as $dados){
                                                            if($dados[1] !== "curso padrão"){
                                                            ?>
                                                                <option value="<?=$dados[0]?>" id="<?= $dados[0]?>"> <?=$dados[1]?> </option>
                                                            <?php
                                                            }
                                                        }
                                        ?>               
                                </select>
                                </div>
                                <div class="t-center">
                                    <button class="bt link-button-1 link-button-geral link font-size-1" type="submit">Novo Turma</button>
                                </div>
            </form>
                     
    
            <div class="mt-100 t-center">
                    <a class="link-button-1 link-button-geral link" href="<?= DOMINIO ?>/turmas"><i class="fa fa-arrow-left mr-20" aria-hidden="true"></i>Voltar</a>
            </div>
        </main>

        <script src="<?= DOMINIO ?>/assets/js/script.js"></script>
</body>
</html>
 