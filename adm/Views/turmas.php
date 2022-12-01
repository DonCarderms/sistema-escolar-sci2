<?php
session_start();

if(!defined('FBHTJ5Y7FDNG')){
    header('Location: ' . DOMINIO);

}else{
    $url = explode("/",filter_input(INPUT_GET,'url',FILTER_DEFAULT));
    $teams = new TurmasController();
    $teams->listTeams();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= DOMINIO ?>/assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css"/>
    <link rel="shortcut icon" href="../assets/images/logo-sci.png" type="image/x-icon">
    <title>Admin</title>
</head>
<body class="d-flex overflow-x" onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()">
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
                <div class="w-100 button-action">
                    <a class="link-button-1 link-button-geral link mr-20" href="<?= DOMINIO ?>/administrative_aera"><i class="fa fa-arrow-left mr-20" aria-hidden="true"></i>Voltar</a>
                    <a class="link-button-1 link-button-geral link" href="<?= DOMINIO ?>/turma_create"><i class="fa fa-plus mr-20" aria-hidden="true"></i>Nova Turma</a>
                </div>
                <div class="div-table">
                <table class="mt-100">
                    <thead>
                        <tr>
                            <th class="turmas-th">Turma</th>
                            <th class="turmas-th">Curso</th>
                            <th class="turmas-th">Código da turma</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $arr_url = explode("?",$_SERVER['REQUEST_URI']);
                            $arr_dados_teams = explode("&",$arr_url[1]);
                            
                            foreach ($teams->listTeams() as $dados) {
                                if($dados[1] !== "turma padrão"){
                                    ?>  
                                <tr>
                                    <td><?= $dados[1] ?> </td>
                                    <td><?= $dados[2] ?></td>
                                    <td> <?= $dados[3] ?> </td>
                                    <td colspan="2">
                                        <div class="d-flex">
                                            <a class="link-button-1 link-button-geral link mr-20" href="<?= DOMINIO ?>/turma?id=<?= $dados[0] ?>&editar=true">
                                                    <i class="fa fa-pencil-square-o icon-action mr-20" aria-hidden="true"></i> 
                                                     Editar
                                            </a>
                                            <a class="link-button-1 link-button-geral link" href="<?= DOMINIO ?>/turma_delete?id=<?= $dados[0] ?>&excluir=true">
                                                     <i class="fa fa-trash icon-action" aria-hidden="true"></i>  
                                                     Excluir
                                            </a>
                                        </div>
                                    </td>
                                </tr>         

                                    <?php
                                }
                            
                            }
                        ?>
                        
                    </tbody>
                </table>
             </div>
        </main>
        <script src="<?= DOMINIO ?>/assets/js/session-logout.js"></script>
</body>
</html>
<?php
}