<?php

class LoginController 
{
    public function logarAluno($email, $senha){

        $aluno = new LoginModel();
        return $aluno->logarAluno($email,$senha);     

    }

}