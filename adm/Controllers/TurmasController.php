<?php

class TurmasController 
{
       public function listTeams(){
         $list_teams = new TurmasModel();
         return $list_teams->listTeams();
       }
}