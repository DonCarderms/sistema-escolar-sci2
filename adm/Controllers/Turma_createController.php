<?php

class Turma_createController

{
    public function newTeam($nome, $codigo, $id_curso){
        $new_team = new Turma_createModel();
        return $new_team->newTeam($nome, $codigo, $id_curso);
     }

}