<?php

class  Administrative_aeraController
{
    function adm(){
      echo  "chegou no adm controler";
      $adm = new Administrative_aeraModel();
      $adm->adm();
    }

    function edit(){
        echo "chamou o editar";
    }
    function sair(){
        header('Location:' . DOMINIO .'');
    }
}
