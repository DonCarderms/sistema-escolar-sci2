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
    <title>Admin</title>

</head>
<body>

     <form method="post">
                        <div>      
                            <label for="nome">Nome aluno: </label>
                            <input type="text" name="nome" id="nome">
                        </div>
                        <div>
                            <label for="email">Email do aluno: </label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div>
                            <label for="senha">Senha do aluno: </label>
                            <input type="text"  name="senha" id="senha">
                        </div>
                        <div>
                            <label for="cpf">cpf do aluno:</label>
                            <input type="number" name="cpf" id="cpf">
                        </div>
                        <div>
                            <label for="dataNascimento">Data de nascimento do aluno: </label>
                            <input type="date" name="dataNascimento" id="dataNascimento">
                        </div>
                        <div>
                            <p>Endereço do aluno</p>
                            <div>
                                <label for="rua">Rua: </label>
                                <input type="text" name="rua" id="rua" >
                            </div>
                            <div>
                                <label for="numero">Numero: </label>
                                <input type="number" name="numero" id="numero" >
                            </div>
                        </div>
                        <div>
                            <label for="newAluno"></label>
                            <input  type="button" name="newAluno" id="newAluno" value="novo aluno">
                        </div>

    </form>
            <div>
                    <a href="<?php echo DOMINIO . "/alunos"?>">Voltar</a>
            </div>

</body>
</html>