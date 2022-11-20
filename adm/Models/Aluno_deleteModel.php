<?php

class Aluno_deleteModel extends ConnectionController
{
  public object $conn;

  public function deleteStud($id){
    $this->conn = $this->connectDb();

    $sql= "DELETE FROM `usuario` WHERE id = '$id'";
    $sql_query = $this->conn->prepare($sql);

    if($sql_query->execute()){
        $_SESSION['aluno_delete'] = "Aluno deletado com sucesso";
    }else{
        $_SESSION['aluno_delete'] = "Houve um erro, Aluno não foi deletado";
    }



  }
}