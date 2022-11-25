<?php
session_start();
class AlunoModel extends ConnectionController {
    
    public object $conn;

    public function edit($dadosedit){
        $this->conn = $this->connectDb();
        
        if(isset($_SESSION['dados'] )){
            $dados = $_SESSION['dados'];                                
        } 

        $id_denreco = $dados['endereco_id'];
        $id = $dados[0];
        $nome = $dadosedit['nome'];
        $email = $dadosedit['email'];
        $senha = md5($dadosedit['senha']);
        $rua = $dadosedit['rua'];
        $numero = $dadosedit['numero'];

        if($dadosedit['senha'] != ""){
            $sql = "UPDATE `usuario` SET `nome` = '$nome', `email` = '$email', `senha` = '$senha'  WHERE `id` = $id";
              $sql_query = $this->conn->prepare($sql); 
              $sql_query->execute();
            }else{
                $sql = "UPDATE `usuario` SET `nome` = '$nome', `email` = '$email' WHERE `id` = $id";   
                $sql_query = $this->conn->prepare($sql); 
                $sql_query->execute();
        }

        $sql2 = "UPDATE `endereco` SET `logradouro` = '$rua', `numero` = '$numero' WHERE `endereco`.`id` = $id_denreco";
        
        $sql_query = $this->conn->prepare($sql2);
      
        if($sql_query->execute()){
            header("Location: " . DOMINIO . "/dashboard");

        }else{
            header("Location: " . DOMINIO . "/aluno/editar");     
        }      
        die();
        
        
    }
}