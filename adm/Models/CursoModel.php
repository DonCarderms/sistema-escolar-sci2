<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
class CursoModel extends ConnectionController
{
    public object $conn;

    
    public function showCours($id){
        $this->conn = $this->connectDb();

        $sql = "SELECT `id`, `nome`, `dataInicio`, `dataFinal` FROM `curso` WHERE `id` = $id";
        $sql_query = $this->conn->prepare($sql);
        $sql_query->execute();
        $sql_dados = $sql_query->fetchAll();   
        return $sql_dados;
    }
    public function editCours($dados_edit){
        $this->conn = $this->connectDb();
        
        $id = $dados_edit['id'];
        $nome = $dados_edit['nome'];
        $data_inicio = $dados_edit['data_inicio'];
        $datafinal =  $dados_edit['data_final'] == ""? 'NULL' : $dados_edit['data_final'];   

        if($datafinal == 'NULL'){
            $sql = "UPDATE `curso` SET `nome` = '$nome', `dataInicio` = '$data_inicio', `dataFinal` = $datafinal WHERE `curso`.`id` = $id";
        }else{
            $sql = "UPDATE `curso` SET `nome` = '$nome', `dataInicio` = '$data_inicio', `dataFinal` = '$datafinal' WHERE `curso`.`id` = $id";
        }
        
        $sql_query = $this->conn->prepare($sql); 
        $sql_query->execute();
        if($sql_query->execute()){         
            $_SESSION['msg'] =  "<p style='text-align:center;color:red;background-color:#fcde00;margin: 0px 0px 10px 0px;padding: 10px 0px;'>Edição realizada com sucesso</p>";
        }else{
            $_SESSION['msg'] = "<p style='text-align:center;color:red;background-color:#fcde00;margin: 0px 0px 10px 0px;padding: 10px 0px;'>Edição não realizada</p>";       
        }      
        die();
        
    }
    public function deleteCours(){

    }
}