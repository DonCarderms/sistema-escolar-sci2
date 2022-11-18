<?php

class Aluno_novoController 
{
    public function newAluno($dadosAluno){
        $newAluno = new Aluno_novoModel();
        return $newAluno->newAluno($dadosAluno);
    }

}

