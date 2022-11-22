<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Eduka</title>
    <link rel="stylesheet" href="<?= DOMINIO ?>/assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css"/>
    <style>
        
    </style>
</head>

<body>
    <main class="principal">
        <div class="">
            <div class="d-flex m-50 div-logo">
                <p style="font-size: 2rem;" class="logo-sci">Academia Sci</p>
                <span class="mt-10">
                    <i class="fa fa-graduation-cap fa-3x" aria-hidden="true"></i>                                 
                </span>
            </div>
            <!-- <div class="align_center">
                 <img src="<?= DOMINIO ?>/assets/images/logo.svg" alt="">
            </div> -->
            <div class="expire">
                    <?php
                        if(isset($_SESSION['expire'] )){
                            echo $_SESSION['expire'];
                            unset($_SESSION['expire']);
                        }
                    ?>
            </div>
            <div class="msg">

            </div>
           
            <form action="" method="POST" class="login" id="login" >
                <input type="email" name="email" placeholder="Email" required class="input-style width-100" ><br>

                <input type="password" name="senha"  placeholder="Senha" class="input-style width-100" ><br>
                <div class="align_center">
                    <button type="submit" class="button-style">Entrar</button>         
                </div>
                              
            </form>
        </div>
       
    </main>
</body>
</html>