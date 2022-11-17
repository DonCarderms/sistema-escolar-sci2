<?php

class AlunosController
{
    public function listStudent(){
        $cours = new AlunosModel();
        return $cours->listStudent();
    }
}