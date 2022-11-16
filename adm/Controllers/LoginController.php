<?php

class LoginController 
{
    public function loginAdm($email, $senha){
        $aluno = new LoginModel();
        return $aluno->loginAdm($email,$senha);     
    }
}