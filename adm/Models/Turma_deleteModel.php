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
                echo "<p style='text-align:center;color:red;background-color:#fcde00;margin: 0px 0px 10px 0px;padding: 10px 0px;'>Turma Excluida  com sucesso</p>";
                echo '<a href="'.DOMINIO .'/turmas">Voltar</a>';
            }else{
                echo "<p style='text-align:center;color:red;background-color:#fcde00;margin: 0px 0px 10px 0px;padding: 10px 0px;'>Excluisão não realizada</p>";          
                echo '<a href="'.DOMINIO .'/turmas">Voltar</a>';
            }      
            die();
        }
}