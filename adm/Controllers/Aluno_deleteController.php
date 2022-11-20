<?php

class Aluno_deleteController 
{
    function deleteStud($id){
        $deleteStud = new Aluno_deleteModel();
        return $deleteStud->deleteStud($id);
    }
}