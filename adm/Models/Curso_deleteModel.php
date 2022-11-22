<?php
session_start();
class Curso_deleteModel extends ConnectionController
{

        public object $conn;

        function delete($id){
            $this->conn = $this->connectDb();
            $sql = "DELETE FROM curso WHERE `curso`.`id` = '$id'";
            $sql_query = $this->conn->prepare($sql);

            if($sql_query->execute()){  
                header('Location: ' . DOMINIO.'/cursos');
            }else{
                header('Location: ' . DOMINIO.'/cursos');
                echo "<p style='width:500px;text-align:center;color:red;background-color:#fcde00;margin: 0px 0px 10px 0px;padding: 10px 0px;'>Ocorreu um errou </p>";
                echo "<a href='". DOMINIO . "/cursos' >Voltar</a>";         
            }      
            die();
        }
}