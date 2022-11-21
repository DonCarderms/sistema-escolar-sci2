<?php

class  Administrative_aeraModel extends ConnectionController {
    public object $conn;

    public function countStudent(){
        $this->conn = $this->connectDb();

        $sql = "SELECT COUNT(*) FROM `usuario` WHERE `nivelAcesso_id` = 3";
        $sql_query = $this->conn->prepare($sql);
        $sql_query->execute();
        $sql_dados = $sql_query->fetchAll();

        return $sql_dados[0];
    }
    public function countTeacher(){
        $this->conn = $this->connectDb();

        $sql = "SELECT COUNT(*) FROM `usuario` WHERE `nivelAcesso_id` = 2";
        $sql_query = $this->conn->prepare($sql);
        $sql_query->execute();
        $sql_dados = $sql_query->fetchAll();

        return $sql_dados[0];
    }
    public function countCourse(){
        $this->conn = $this->connectDb();

        $sql = "SELECT COUNT(*)  FROM `curso`";
        $sql_query = $this->conn->prepare($sql);
        $sql_query->execute();
        $sql_dados = $sql_query->fetchAll();

        return $sql_dados[0];
    }
    public function countTeam(){
        $this->conn = $this->connectDb();

        $sql = "SELECT COUNT(*) FROM `turma`";
        $sql_query = $this->conn->prepare($sql);
        $sql_query->execute();
        $sql_dados = $sql_query->fetchAll();

        return $sql_dados[0];
    }

}