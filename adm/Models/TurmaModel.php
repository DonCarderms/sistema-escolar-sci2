<?php
session_start();

class TurmaModel extends ConnectionController
{
    public object $conn;

    public function editTeam($dados_edits){
        $this->conn = $this->connectDb();

        if(isset($_SESSION['id_team'])){$id =  $_SESSION['id_team'];}
        $nome = $dados_edits['nome'];
        $id_curso = $dados_edits['cursos'];
    
        if($id_curso !== ""){     
            $sql = "UPDATE `turma` SET `nome` = '$nome', `curso_id` = '$id_curso' WHERE `turma`.`id` = '$id'";
        }else{
            $sql = "UPDATE `turma` SET `nome` = '$nome' WHERE `turma`.`id` = '$id'";
        }

        $sql_query = $this->conn->prepare($sql);
        if($sql_query->execute()){
            header('Location: ' . DOMINIO.'/turmas');
        }else{
            header('Location: ' . DOMINIO.'/turma');
        }
        
    }
    public function thisTeam($id){
        $this->conn = $this->connectDb();
        
            $sql = "SELECT turma.nome, curso.nome as 'curso' FROM `turma` 
            INNER join curso ON curso.id = turma.curso_id
            WHERE turma.id = $id";
            $sql_query = $this->conn->prepare($sql);
            $sql_query->execute();
            $sql_dados = $sql_query->fetchAll();

            return $sql_dados;
      
        
    }

    
}