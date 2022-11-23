<?php
session_start();

class Turma_deleteModel extends ConnectionController
{

        public object $conn;

        function deleteTeam($id){
            $this->conn = $this->connectDb();
            $sql = "DELETE FROM turma WHERE `turma`.`id` = '$id'";   

            $sql_query = $this->conn->prepare($sql);

            if($sql_query->execute()){                   
                 header('Location: ' . DOMINIO.'/turmas');
                 
            }else{
                header('Location: ' . DOMINIO.'/turmas');
            }      
            die();
        }
}