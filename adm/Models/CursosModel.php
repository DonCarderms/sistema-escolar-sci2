<?php
session_start();
class CursosModel extends ConnectionController 
{
    public object $conn;
    public function listCours(){
        $this->conn = $this->connectDb();

        $sql = "SELECT `id`, `nome`, `dataInicio`, `dataFinal` FROM `curso`";
        $sql_query = $this->conn->prepare($sql);
        $sql_query->execute();
        $sql_dados = $sql_query->fetchAll();
        return $sql_dados;
    }
}