<?php
session_start();

class Turma_createModel extends ConnectionController
{
    public object $conn;

    public function newTeam($nome, $codigo, $id_curso){
        $this->conn = $this->connectDb();
        
        if($nome !== "" && $codigo !== "" && $id_curso !== "0"){
            $sql = "INSERT INTO `turma` (`id`, `nome`, `codigo`, `curso_id`) VALUES (NULL, '$nome', '$codigo', '$id_curso')";
            $sql_query = $this->conn->prepare($sql);

                if($sql_query->execute()){
                    header('Location: ' . DOMINIO.'/turmas');
                }else{
                    header('Location: ' . DOMINIO.'/turmas');
                }

            }else{
            
                    $_SESSION['newteam'] = "Dados não preenchidas";

        }

    }
}
