<?php
session_start();

if($_POST){
    var_dump($_POST);
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
                            <input type="text" name="email" id="email">
                        </div>
                        <div>
                            <label for="senha">Senha do aluno: </label>
                            <input type="text"  name="senha" id="senha">
                        </div>
                        <div>
                            <label for="cpf">cpf do aluno:</label>
                            <?php
                                if(isset($_SESSION['errorCpf'])){$rr = $_SESSION['errorCpf'];unset($_SESSION['errorCpf']);}
                            ?>
                            <input type="text" name="cpf" id="cpf" value="<?= $rr ?>">
                        </div>
                        <div>
                            <label for="dataNascimento">Data de nascimento do aluno: </label>
                            <input type="text" name="dataNascimento" id="dataNascimento" value="aa-mm-dd" >
                        </div>
                        <div>
                            <p>Endereço do aluno</p>
                            <div>
                                <label for="rua">Rua: </label>
                                <input type="text" name="rua" id="rua" >
                            </div>
                            <div>
                                <label for="numero">Numero: </label>
                                <input type="text" name="numero" id="numero" >
                            </div>
                        </div>
                        <div>
                            <label for="newAluno"></label>
                            <input  type="submit" name="newAluno" id="newAluno" value="novo aluno">
                        </div>
                        
                    </form>
                  
            <!-- <form method="post">
                <label for="nomesobrenome">Nome e sobrenome</label>
                <input type="text" id="nome" name="nome">

                <label for="email">Emal</label>
                <input type="text" id="email" name="email">

                <label for="telefone"> cpf</label>
                <input type="text" id="telefone">


                <div>
                    <p>Como prefere o nosso contato?</p>
                    <label for="radio-email">Email</label>
                    <input type="radio" name="contato" value="email" id="radio-email">

                    <label for="radio-telefone">Telefone</label>
                    <input type="radio" name="contato" value="telefone" id="radio-telefone">

                    <label for="radio-whatsapp">WhatsApp</label>
                    <input type="radio" name="contato" value="whatsapp" id="radio-whatsapp">
                </div>

                <label><input type="checkbox">Gostaria de receber nossas novidades por e-mail?</label>

                <input type="submit" value="Enviar formulário">
            </form> -->
            <div>
                    <a href="<?php echo DOMINIO . "/alunos"?>">Voltar</a>
            </div>

</body>
</html>