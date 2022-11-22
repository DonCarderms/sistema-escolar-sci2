<?php
session_start();
if(!defined('FBHTJ5Y7FDNG')){
    header('Location: ' . DOMINIO);

}else{

$adm = new Administrative_aeraController();

                $student = $adm->countStudent();
                $prof = $adm->countTeacher();
                $cours = $adm->countCourse();
                $team = $adm->countTeam();
            
                $url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
                $arr_url = explode('/', $url);

                if($arr_url[1] == "sair"){
                    $adm->exit();
                }    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrative area</title>
    <link rel="stylesheet" href="<?= DOMINIO ?>/assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css"/>

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
    <main class="w-100 h-100 d-flex flex_column align-items-center align-content-center justify-content-center">
        <div class="d-flex m-50 div-logo">
            <p class="logo-sci">Academia Sci</p>
            <span class="mt-10">
                <i class="fa fa-graduation-cap fa-5x" aria-hidden="true"></i>                                 
            </span>
        </div>
        <div class="d-flex justify-content-center wrap content mt-50">
                <div class="p-10 w-300 content-item d-flex flex_column   pt-50"> 
                    <span class="mt-10">
                        <i class="color_light fa fa-user-circle fa-5x" aria-hidden="true"></i>                      
                    </span>                   
                    <p><?= $student[0]  ?> Alunos cadatradas</p>
                </div>
                <!-- <div class="p-10"><p><?= $prof[0]  ?> Professor(es) </p></div> -->
                <div class="p-10 w-300 content-item d-flex flex_column   pt-50">
                        <span class="mt-10">
                            <i class="color_light fa fa-graduation-cap fa-5x" aria-hidden="true"></i>                                 
                        </span>
                    <p><?= $cours[0]  ?> Cursos Disponiveis(s)</p>
                </div>
                <div class="p-10 w-300 content-item d-flex flex_column   pt-50">
                <span class="nav-ul-link-icon mt-10">
                     <i class="color_light fa  fa-users fa-5x" aria-hidden="true"></i>                      
                 </span>
                    <p><?= $team[0]  ?> Turma(s)</p>
                </div>
        </div>
               
    </main>
      

       
              
   
        
        
        

</body>
</html>
<?php
}