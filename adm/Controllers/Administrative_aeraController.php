<?php

class  Administrative_aeraController
{
    function countStudent(){
      $adm = new Administrative_aeraModel();
      return $adm->countStudent();
    }
    function countTeacher(){
      $adm = new Administrative_aeraModel();
      return $adm->countTeacher();
    }
    function countCourse(){
      $adm = new Administrative_aeraModel();
      return $adm->countCourse();
    }
    function countTeam(){
      $adm = new Administrative_aeraModel();
      return $adm->countTeam();
    }

    public function exit(){
      header('Location: ' . DOMINIO);
      unset($_SESSION['dados']);
    }
}
