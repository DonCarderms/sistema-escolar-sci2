<?php

class TurmaController 
{
    function editTeam($dados_edits){
        $edit_team = new TurmaModel();
        return $edit_team->editTeam($dados_edits);
    }
    function thisTeam($id){
        $thisTeam = new TurmaModel();
        return $thisTeam->thisTeam($id);
    }
}