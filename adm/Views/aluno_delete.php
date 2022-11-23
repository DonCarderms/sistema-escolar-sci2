<?php
session_start();

$arr_url = explode("?",$_SERVER['REQUEST_URI']);
$arr_dados_stud = explode("&",$arr_url[1]);

if($arr_dados_stud[1] == "excluir=true"){
    $id = explode("=",$arr_dados_stud[0]);
    $delete_stud = new Aluno_deleteController();
    $delete_stud->deleteStud($id[1]);

}