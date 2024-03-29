<?php
session_start();

if($_POST){
    $newAluno = new Aluno_novoController();
    $newAluno->newAluno($_POST);
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
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
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

                    <form method="post">
                            <p class=" font-size-1 bg-error">
                                <?php
                                    if(isset($_SESSION['errorData'])){echo $_SESSION['errorData'];unset($_SESSION['errorData']);}else{unset($_SESSION['errorData']);}
                                ?>
                                <?php
                                    if(isset($_SESSION['executeFalse'])){echo $_SESSION['executeFalse'];unset($_SESSION['executeFalse']);}else{unset($_SESSION['executeFalse']);}
                                ?>
                            </p>
                            <div>      
                                <label for="nome"></label>
                                <input class="input-style w-100"  type="text" name="nome" id="nome" placeholder="Nome aluno">
                            </div>
                            <div>
                                <label for="email"></label>
                                <input class="input-style w-100"  type="email" name="email" id="email" placeholder="Email do aluno">
                            </div>
                            <div>
                                <label for="senha"></label>
                                <input class="input-style w-100"  type="text"  name="senha" id="senha" placeholder="Senha de acesso do aluno">
                            </div>
                            <div>
                                <?php
                                    if(isset($_SESSION['errorCpf'])){$errorCpf = $_SESSION['errorCpf'];unset($_SESSION['errorCpf']);}else{unset($_SESSION['errorCpf']);}
                                ?>
                                <label for="cpf"><?= $errorCpf ?></label>
                                <input class="input-style w-100"  type="number" name="cpf" id="cpf" placeholder="CPF do aluno">
                            </div>
                            <div>
                                <label for="dataNascimento">Data de nascimento do aluno </label>
                                <input class="input-style w-100" type="date" name="dataNascimento" id="dataNascimento" placeholder="aa-mm-dd mm">
                            </div>
                            <div>
                                <div>
                                    <label for="rua"></label>
                                    <input class="input-style w-100" type="text" name="rua" id="rua"  placeholder="Endereço">
                                </div>
                                <div>
                                    <label for="numero"></label>
                                    <input class="input-style w-100"  type="number" name="numero" id="numero" placeholder="Numero">
                                </div>
                            </div>
                        
                            <div>
                                <label for="curso"></label>
                                <select class="input-style bg-primary" name="curso" id="curso">   
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
                            <div>
                                <label for="turma"></label>
                                <select class="input-style bg-primary" name="turma" id="turma">   
                                        <option value="0">Selecione a Turma</option>            
                                        <?php
                                                        $teams = new TurmasController();
                                                        $teams->listTeams();
                                                        foreach($teams->listTeams() as $dados){
                                                            if($dados[1] !== "turma padrão"){
                                                            ?>
                                                                <option value="<?=$dados[0]?>" id="<?= $dados[0]?>"> <?=$dados[1]?> </option>
                                                            <?php
                                                            }
                                                        }
                                        ?>               
                                </select>
                            </div>
                            <div class="t-center">
                                <label for="newAluno"></label>
                                <button class="bt link-button-1 link-button-geral link font-size-1" type="submit" name="newAluno" id="newAluno">novo aluno</button>
                            </div>
                            
                        </form>
                    
                <div class="mt-50">
                        <a class="link-button-1 link-button-geral link font-size-1" href="<?= DOMINIO ?>/alunos"><i class="fa fa-arrow-left mr-20" aria-hidden="true"></i>Voltar</a>
                </div>
            </main>

            <!-- <script src="https://code.jquery.com/jquery-1.12.4.js">
                
            </script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
                $( function() {
                    $( ".datepicker" ).datepicker();
                });
            </script> -->
        <script src="<?= DOMINIO ?>/assets/js/session-logout.js"></script>
</body>
</html>