<?php
class Turma_deleteController 
{
   public function deleteTeam($id){
            $delete_team = new Turma_deleteModel();
            return $delete_team->deleteTeam($id);
    }
}