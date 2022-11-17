<?php

class Curso_createController
{

    public function newCours($newPost){
                $newCours = new Curso_createModel();
                return  $newCours->newCours($newPost['nome'], $newPost['dataInicio'] , $newPost['dataFinal']);              
    }

}