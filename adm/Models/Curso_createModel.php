<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
class Curso_createModel extends ConnectionController 
{
    public object $conn;

    public function newCours($nome, $dataInicio , $dataFinal){
        $this->conn = $this->connectDb();

        if($dataFinal == ""){
          $dataFinal = 'NULL';
          $sql = "INSERT INTO `curso` (`id`, `nome`, `dataInicio`, `dataFinal`) VALUES (NULL, '$nome', '$dataInicio', $dataFinal)";
        }else{
            $sql = "INSERT INTO `curso` (`id`, `nome`, `dataInicio`, `dataFinal`) VALUES (NULL, '$nome', '$dataInicio', '$dataFinal')";
        } 

            $sql_query = $this->conn->prepare($sql); 

            if($sql_query->execute()){
                header('Location: ' . DOMINIO.'/cursos');
            }else{
                header('Location: ' . DOMINIO.'/curso_create');
                         
                }  

            die();
            
          
    }
}