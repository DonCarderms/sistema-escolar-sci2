<?php

class curso_deletecontroller
{
        function delete($id){
            $delete = new Curso_deleteModel();
            return $delete->delete($id);
        }
}