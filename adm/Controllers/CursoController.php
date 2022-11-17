<?php
class CursoController {

    public function showCours($id){
        $showCours = new CursoModel();
        return $showCours->showCours($id);
    }
    public function newCours(){
        $newCours = new CursoModel();
        return $newCours->newCours();
    }
    public function editCours($dados_edit){
        $editCours = new CursoModel();
        return $editCours->editCours($dados_edit);
    }
    public function deleteCours(){
        $deleteCours = new CursoModel();
        return $deleteCours->deleteCours();
    }
}