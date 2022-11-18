<?php
session_start();
if(isset($_SESSION['dados'])){
                
}else{
    header('Location: ' . DOMINIO);
   
}
$arr_url = explode("?",$_SERVER['REQUEST_URI']);
$arr_dados_cours = explode("&",$arr_url[1]);

if($_POST){
    // header('Location:' .DOMINIO.'/curso_delete?id='.$dados[0].'&excluir=true');
    $delete_cours = new Curso_deleteController();
    $delete_cours->delete($_POST);
}

if($arr_dados_cours[1] == "excluir=true"){
    $id = explode("=", $arr_dados_cours[0]);
    $delete_cours = new Curso_deleteController();
    
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin </title>
    </head>
    <body>

            <div class="">
                <?php
                    $delete_cours->delete(($id[1]));
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);                     
                    }
                ?>
            </div>
            <div>
                <a href="<?php echo DOMINIO . "/cursos"; ?>">Voltar</a>
            </div>
    </body>
    </html>
<?php    
}
