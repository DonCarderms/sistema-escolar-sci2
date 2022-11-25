<?php

session_start();
class Aluno_deleteModel extends ConnectionController
{
  public object $conn;

  public function deleteStud($id){
    $this->conn = $this->connectDb();

    $sql1 = "SELECT `endereco_id` FROM `usuario` WHERE id = '$id'";
    $sql_query1 = $this->conn->prepare($sql1);
    $sql_query1->execute();
    $sql_dados = $sql_query1->fetchAll();
    $id_endereco = $sql_dados[0][0];

    $sql= "DELETE FROM `usuario` WHERE id = '$id'";
    $sql_query = $this->conn->prepare($sql);


    $sql3= "DELETE FROM `endereco` WHERE id = '$id_endereco'";
    $sql_query3 = $this->conn->prepare($sql3);


    if($sql_query->execute() && $sql_query3->execute()){
        header('Location: ' . DOMINIO.'/alunos');
    }else{
        header('Location: ' . DOMINIO.'/alunos');
    }

  }
}