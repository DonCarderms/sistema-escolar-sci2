<?php
class AlunoController 
{
    public function showStudent($id){
        $showStud = new AlunoModel();
        return $showStud->showStudent($id);
    }

    public function editStud($dadosEdits){
        $edit = new AlunoModel();
        $edit->editStud($dadosEdits);

    }
}