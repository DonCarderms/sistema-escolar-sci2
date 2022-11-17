<?php

class AlunosModel extends ConnectionController 
{
    public object $conn;
    public function listStudent(){
        $this->conn = $this->connectDb();

        $sql = "SELECT usuario.id, usuario.nome, curso.nome as 'Curso', turma.nome as 'Turma', turma.codigo as 'Código da turma', usuario.email, usuario.cpf, usuario.dataNascimento 'data de nascimento', endereco.logradouro as 'rua', endereco.numero as 'numero' FROM `usuario` INNER join curso on curso.id = usuario.curso_id
        INNER join turma on turma.id = usuario.turma_id
        INNER join endereco on endereco.id = usuario.endereco_id
        WHERE nivelAcesso_id = 3";
        $sql_query = $this->conn->prepare($sql);
        $sql_query->execute();
        $sql_dados = $sql_query->fetchAll();
        
        return $sql_dados;
    }
}