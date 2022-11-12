<?php
session_start();
class AlunoModel extends ConnectionController {
    
    public object $conn;

    public function edit($dadosedit){
        echo "chegou no editar aluno model ";
        if(isset($_SESSION['dados'] )){
            $dados = $_SESSION['dados'];                                
        }   
        $id = $dados['1'];
        $nome = $dadosedit['nome'];
        $email = $dadosedit['email'];
         
        $sql = "UPDATE `usuario` SET `nome` = '$nome', `email` = '$email' WHERE `usuario`.`id` = $id;";  
        $sql_query = $this->conn->prepare($sql);
        $sql_query->execute();
     
        if($sql_query->execute()){
            $_SESSION['edit'] = "<p style=''>Edição realizada com sucesso</p>";
            
        }else{
            $_SESSION['edit'] = "<p style=''>Edição não realizada</p>";
            
        }
        die();
               
        
    }
}