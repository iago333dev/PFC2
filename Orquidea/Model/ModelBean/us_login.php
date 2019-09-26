<?php


class us_login {
    private $login;
    private $senha;   
    
    
    public function __construct($login,$senha) {
        $this->login = $login;
        $this->senha = $senha;
        
    }
   
   Public function getLogin() {
        return $this->login;
    }

   Public function getSenha() {
        return $this->senha;
    }





}
