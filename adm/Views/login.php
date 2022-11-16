<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Eduka</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <main class="principal">
        <div class="">
            <div class="align_center">
                 <img src="<?= DOMINIO ?>/assets/images/logo.svg" alt="">
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