<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Sci </title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css"/>
    <link rel="shortcut icon" href="../assets/images/logo-sci.png" type="image/x-icon">
</head>

<body>
                <?php
                        if(isset($_SESSION['expire'] )){
                            ?>
                            <div class="expire d-flex justify-content-center">
                                <i class="fa fa-times fa-2x mr-20" aria-hidden="true"></i>
                                <p class=" mt-10"><?=$_SESSION['expire']?></p>
                            </div>
                            <?php
                            unset($_SESSION['expire']);
                        }
                    ?>
    <main class="principal">
        <div class="card-login">
            <p class="t-center mb-50 pt-aluno-card">Portal do Aluno</p>
            <div class="d-flex m-50 div-logo">
                <p class="logo-sci">Academia Sci</p>
                <span class="mt-10">
                    <i class="fa fa-graduation-cap fa-3x" aria-hidden="true"></i>                                 
                </span>
            </div>
            <!-- <div class="align_center">
                 <img src="<?= DOMINIO ?>/assets/images/logo.svg" alt="">
            </div> -->

            <div class="msg">
                    <?php
                        if(isset($_SESSION['msg'] )){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                    ?>
            </div>
           
            <form action="" method="POST" class="login" id="login" >
                <div>
                    <i class="fa fa-envelope icon fa-2x"></i>
                    <label for="email"></label>
                    <input type="email" name="email" id="email" placeholder="Email" required class="input-style width-100" ><br>
                </div>
                <div>
                    <i class="fa fa-lock icon fa-2x"></i>
                    <label for="senha"></label>
                    <input type="password" name="senha" id="senha"  placeholder="Senha" class="input-style width-100" ><br>
                </div>
                <div class="align_center">
                    <button type="submit" class="button-style"><span class=" mr-20">Entrar</span> <i class="fa fa-arrow-right" aria-hidden="true"></i></button>         
                </div>
                
            </form>
        </div>
       
    </main>

    <script>
    </script>
</body>
</html>