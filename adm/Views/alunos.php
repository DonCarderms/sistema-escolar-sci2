<?php
session_start();

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
         <link rel="stylesheet" href="<?= DOMINIO ?>/assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css"/>
         <!-- <link rel="stylesheet" href="<?= DOMINIO ?>/assets/css/style.scss"> -->
        <title>Alunos</title>
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
                        <ul class="nav-ul">
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
        <main class="w-100 d-flex flex_column align-items-center align-content-center justify-content-space-around">
            <h1 class="w-100 t-center"> Alunos</h1>
            <div class="w-100 button-action">
                <a class="link-button-1 link-button-geral link" href="<?= DOMINIO ?>/aluno_novo">Novo Aluno</a>
            </div>
            <div class="w-100 button-action ">
                <input class="input-filtre" type="search" value="" placeholder="flitrar por nome do aluno">
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Curso</th>
                        <th>Turma</th>
                        <th>Código da Turma</th>
                        <th>Email</th>
                        <th>CPF</th>
                        <th>Data de nascimento</th>
                        <th>Endereço</th>
                        <th colspan="2"</th>
                    </tr>
                </thead>
    
                <tbody>
    
                    <?php
                        $arr_url = explode("?",$_SERVER['REQUEST_URI']);
                        $arr_dados_prod = explode("&",$arr_url[1]);
                        
                        foreach ($stud->listStudent() as $dados) {
                            if($dados[2] == 'curso padrão' && $dados[3] == 'turma padrão'){
                                ?>
                                <tr>
                                    <td><?=  $dados[1] ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?=  $dados[5] ?></td>
                                    <td><?=  $dados[6] ?></td>             
                                    <td><?=  $dados[7] ?></td>
                                    <td><?=  $dados[8]; $dados[9] ?></td>
                                    <td colspan="2">
                                        <a class="link-button-1 link-button-geral link"  href="<?= DOMINIO ?>/aluno?id=<?= $dados[0] ?>&editar=true">Editar</a>
                                        <a class="link-button-1 link-button-geral link" href="<?= DOMINIO ?>/aluno_delete?id=<?= $dados[0] ?>&excluir=true">Excluir</a>
                                    </td>
                                    
                                </tr>
                                <!-- <p>Nome do Aluno: </p>
                                <p>email: <?=  $dados[5] ?></p>
                                <p>cpf: <?=  $dados[6] ?></p>
                                <p>data de nascimento: <?=  $dados[7] ?></p>
                                <p>Endereço: <?=  $dados[8] ?>, <?=  $dados[9] ?></p> -->
                                
                                <?php
                            }else{
                                ?>
                                    <tr>
                                        <td><?=  $dados[1] ?></td>
                                        <td><?=  $dados[2] ?></td>
                                        <td><?=  $dados[3] ?></td>
                                        <td><?=  $dados[4] ?></td>
                                        <td><?=  $dados[5] ?></td>
                                        <td><?=  $dados[6] ?></td>
                                        <td><?=  $dados[7] ?></td>
                                        <td> <?=  $dados[8] ?>, <?=  $dados[9] ?></td>
                                        <td colspan="2">
                                            <a class="link-button-1 link-button-geral link" href="<?= DOMINIO ?>/aluno?id=<?= $dados[0] ?>&editar=true">Editar</a>
                                            <a class="link-button-1 link-button-geral link" href="<?= DOMINIO ?>/aluno_delete?id=<?= $dados[0] ?>&excluir=true">Excluir</a>
                                        </td>
                                        
                                    </tr>
                                    <?php
                            }
                            
                            //   var_dump($dados); 
                        }
                        ?>
                </tbody>
            </table>
            <br>
            <div class="w-100 button-action">
                <a class="link-button-1 link-button-geral link" href="<?= DOMINIO ?>/administrative_aera">Voltar</a>
            </div>
            
        </main>
        
        
    </body>
    </html>
    <?php
   
}