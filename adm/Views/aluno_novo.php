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

                <div>
                    <p>
                        <?php
                            if(isset($_SESSION['aluno_novo'])){echo $_SESSION['aluno_novo'];unset($_SESSION['aluno_novo']);}
                        ?>
                    </p>
                </div>

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
                                if(isset($_SESSION['errorCpf'])){$errorCpf = $_SESSION['errorCpf'];unset($_SESSION['errorCpf']);}
                            ?>
                            <input type="text" name="cpf" id="cpf" placeholder="<?= $errorCpf ?>">
                        </div>
                        <div>
                            <label for="dataNascimento">Data de nascimento do aluno: </label>
                            <input type="text" name="dataNascimento" id="dataNascimento" placeholder="aa-mm-dd">
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
                        <div>
                            <label for="newAluno"></label>
                            <input  type="submit" name="newAluno" id="newAluno" value="novo aluno">
                        </div>
                        
                    </form>
                  
            <div>
                    <a href="<?php echo DOMINIO . "/alunos"?>">Voltar</a>
            </div>


</body>
</html>