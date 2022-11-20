<?php

session_start();
class TurmasModel extends ConnectionController
{
    public object $conn;

    public function listTeams(){
        $this->conn = $this->connectDb();

        $sql = "SELECT turma.id, turma.nome, curso.nome as 'curso', turma.codigo FROM `turma` 
        INNER JOIN curso on curso.id = turma.curso_id";
        $sql_query = $this->conn->prepare($sql);
        $sql_query->execute();
        $sql_dados = $sql_query->fetchAll();
        return $sql_dados;
    }
}