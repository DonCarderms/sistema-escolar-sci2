<?php
  session_start();
  $arr_url = explode("?",$_SERVER['REQUEST_URI']);
  $arr_dados_prod = explode("&",$arr_url[1]);
  
  if($_POST)
{
    $dados_edit = new AlunoController();
    $dados_edit->edit($_POST);
    
}
if($arr_dados_prod[1] == "editar=true"){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eduka</title>
        <link rel="stylesheet" href="<?= DOMINIO ?>/assets/css/style.css">
    </head>
    <body>

            <main>
                <div class="">
                    <?php
                        if(isset($_SESSION['dados'] )){
                            $dados = $_SESSION['dados'];                                
                        } 

                    ?>

                </div>

                <div class="conteudo">                
                                  
                 <form method="Post">

                     <label for="">Nome</label>
                     <input type="text" name="nome" id="nome" value="<?= $aluno[0] ?>"></br>

                     <label for="">email</label>
                     <input type="text" name="email" id="email" value="<?= $aluno[4] ?>"></br>

                     <label for="">Senha</label>
                     <input type="text" name="senha" id="senha" value=""></br>
     
                     <p>Endereço</p>                
                     <label for="">Nome da rua</label>
                     <input type="text" name="rua" id="rua" value="<?= $aluno[7] ?>"></br>                
                     <label for="">numero da rua</label>
                     <input type="text" name="numero" id="numero" value="<?= $aluno[8] ?>"></br> 

                     <button class="link-button-2 link-button-geral" type="submit">Confirmar</button>

                     
                 </form>

                 <a class="link" href="<?= DOMINIO ?>/dashboard">voltar</a>
                        
                </div>
            
            </main>
                
    </body>
    </html>
  <?php

                        }