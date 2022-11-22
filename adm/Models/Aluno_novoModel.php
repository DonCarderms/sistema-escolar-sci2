<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

class Aluno_novoModel extends ConnectionController
{
    public object $conn;

    public function newAluno($dadosAluno){
        $this->conn = $this->connectDb();

        $nome = $dadosAluno['nome']; 
        $email = $dadosAluno['email'];
        $senha = md5($dadosAluno['senha']);
        $cpf = $dadosAluno['cpf'];
        $dataNascimento =  $dadosAluno['dataNascimento']; 
        $rua = $dadosAluno['rua'];
        $numero = $dadosAluno['numero'];

        $id_curso = $dadosAluno['curso'] == "0" ? 39 : $dadosAluno['curso'];
        
        $id_turma = $dadosAluno['turma'] == "0"? 3 : $dadosAluno['turma'];
 
          // endereco
        $sql_endereco = "INSERT INTO `endereco` (`id`, `logradouro`, `numero`) VALUES (NULL, '$rua', '$numero')";

        $sql_query_endereco = $this->conn->prepare($sql_endereco);
        $sql_query_endereco->execute();
        
        $sql3 ="SELECT endereco.id FROM endereco WHERE logradouro = '$rua' AND numero = '$numero'";
        $sql_query3 = $this->conn->prepare($sql3);
        $sql_query3->execute();
        $id_endereco = $sql_dados3 = $sql_query3->fetchAll()[0]['id'];


        

        if(number_format($cpf) == NULL && strlen($cpf) != 8){
            $_SESSION['errorCpf'] = "formato de cpf  errado";
        }else{
            
            if($dadosAluno['dataNascimento'] == "" || $dadosAluno['nome'] == "" || $dadosAluno['email'] == "" || $dadosAluno['senha'] == "" || $dadosAluno['cpf'] == "" || $dadosAluno['rua'] == "" || $dadosAluno['numero'] == ""){
                echo "todos os dados tem que ser preenchidas";
            }else{        
                $sql = "INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `cpf`, `dataNascimento`, `situacao_id`, `nivelAcesso_id`, `turma_id`, `endereco_id`, `curso_id`) VALUES (NULL, '$nome', '$email', '$senha', '$cpf', '$dataNascimento', '1', '3', '$id_turma', '$id_endereco', '$id_curso')";
                $sql_query = $this->conn->prepare($sql); 
                if($sql_query->execute()){
                    header('Location: ' . DOMINIO.'/alunos');
                 }else{
                    header('Location: ' . DOMINIO.'/aluno_novo');

                 }
             }
      
        }
    }
}