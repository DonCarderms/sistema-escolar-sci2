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
                echo  "<p style='text-align:center;color:red;background-color:#fcde00;margin: 0px 0px 10px 0px;padding: 10px 0px;'>Curso cadastrada com sucesso</p>";
                echo ' <a href="'. DOMINIO . '/cursos">voltar</a>';    
            }else{
                 echo "<p style='text-align:center;color:red;background-color:#fcde00;margin: 0px 0px 10px 0px;padding: 10px 0px;'>Curso  não cadstrada</p>";
                echo ' <a class="link" href="'. DOMINIO . '/cursos">voltar</a>';            
            }      
            die();
            
          
    }
}