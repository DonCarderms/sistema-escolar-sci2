<?php

class CursosController
{
    public function listCours(){
        $cours = new CursosModel();
        return $cours->listCours();
    }
}