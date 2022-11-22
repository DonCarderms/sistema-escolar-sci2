<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

class AlunoModel extends ConnectionController
{
    public object $conn;

    
    public function showStudent($id){
        $this->conn = $this->connectDb();
        
        $sql = "SELECT usuario.id, usuario.nome, curso.nome as 'Curso', turma.nome as 'Turma', turma.codigo as 'Código da turma', usuario.email, usuario.cpf, usuario.dataNascimento 'data de nascimento', endereco.logradouro as 'rua', endereco.numero as 'numero', usuario.senha as 'senha', endereco.id as 'endereco_id' FROM `usuario` INNER join curso on curso.id = usuario.curso_id
        INNER join turma on turma.id = usuario.turma_id
        INNER join endereco on endereco.id = usuario.endereco_id
        WHERE usuario.id = '$id'";
        $sql_query = $this->conn->prepare($sql);
        $sql_query->execute();
        $sql_dados = $sql_query->fetchAll();
        $_SESSION['endereco_id'] = $sql_dados[0][11];
        return $sql_dados;
    }
    
    public function editStud($dadosEdits){
        $this->conn = $this->connectDb();;  
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            unset($_SESSION['id']);
        } 
        if(isset($_SESSION['endereco_id'])){
            $id_endereco = $_SESSION['endereco_id'];
            unset($_SESSION['endereco_id']);
        } 

                                                      
        $nome = $dadosEdits['nome'];
        $email = $dadosEdits['email'];
        $senha = md5($dadosEdits['senha']);
        $cpf = $dadosEdits['cpf'];
        $dataNascimento = $dadosEdits['dataNascimento'];
        $rua = $dadosEdits['rua'];
        $numero = $dadosEdits['numero'];

        if($dadosEdits['senha'] == ""){
            $sql = "UPDATE `usuario` SET `nome` = '$nome', `email` = '$email', `cpf` = '$cpf', `dataNascimento` = '$dataNascimento'  WHERE `id` = '$id'";   
            $sql_query1 = $this->conn->prepare($sql); 
            $sql_query1->execute();
        }else{
            $sql = "UPDATE `usuario` SET `nome` = '$nome', `email` = '$email', `senha` = '$senha', `cpf` = '$cpf', `dataNascimento` = '$dataNascimento' WHERE `id` = '$id'";   
            $sql_query1 = $this->conn->prepare($sql); 
           $sql_query1->execute();
        }
            
        
        
        $sql2 = "UPDATE `endereco` SET `logradouro` = '$rua', `numero` = '$numero' WHERE `endereco`.`id` = '$id_endereco'";
        $sql_query2 = $this->conn->prepare($sql2); 
        $sql_query2->execute();
        
       if($sql_query1->execute() && $sql_query2->execute()){
                header('Location: ' . DOMINIO.'/alunos');
           
       }elseif($sql_query1->execute()){
                header('Location: ' . DOMINIO.'/alunos');

       }elseif($sql_query2->execute()){
                header('Location: ' . DOMINIO.'/alunos');
       }
    }


   
}