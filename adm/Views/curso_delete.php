<?php
session_start();

$arr_url = explode("?",$_SERVER['REQUEST_URI']);
$arr_dados_cours = explode("&",$arr_url[1]);

if($_POST){
    $delete_cours = new Curso_deleteController();
    $delete_cours->delete($_POST);
}

if($arr_dados_cours[1] == "excluir=true"){
    $id = explode("=", $arr_dados_cours[0]);
    $delete_cours = new Curso_deleteController();
       
}
