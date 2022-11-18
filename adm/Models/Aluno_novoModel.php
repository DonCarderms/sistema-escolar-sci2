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
        
        if($dadosAluno['dataNascimento'] == "" || $dadosAluno['nome'] == "" || $dadosAluno['email'] == "" || $dadosAluno['senha'] == "" || $dadosAluno['cpf'] == "" || $dadosAluno['rua'] == "" || $dadosAluno['numero'] == ""){
            echo "todos os dados tem que ser preenchidas";
        }else{        
            $sql = "INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `cpf`, `dataNascimento`, `situacao_id`, `nivelAcesso_id`, `turma_id`, `endereco_id`, `curso_id`) VALUES (NULL, '$nome', '$email', '$senha', '$cpf', '$dataNascimento', '1', '3', NULL, NULL, NULL)";
            var_dump($sql);
            $sql_query = $this->conn->prepare($sql); 
            $sql_query->execute();
       
        }
    }
}