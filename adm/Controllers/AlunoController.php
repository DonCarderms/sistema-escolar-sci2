<?php
class AlunoController 
{
    public function showStudent($id){
        $showStud = new AlunoModel();
        return $showStud->showStudent($id);
    }
}