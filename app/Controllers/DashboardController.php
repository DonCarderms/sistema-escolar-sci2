<?php


class DashboardController{

    public function mostrarDadosAluno(){
        $dados = new DashboardModel();
        return $dados->mostrarDadosAluno();
    }

    public function exit(){
        header('Location: ' . DOMINIO);
        unset($_SESSION['dados']);
    }
       
}