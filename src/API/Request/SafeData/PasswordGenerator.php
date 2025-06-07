<?php
namespace App\API\Request\SafeData;

class PasswordGenerator{

    // Criando um gerador de senhas em Hash

    public function GeradorSenhas($passwd){
        if(defined("PASSWORD_ARGON2ID")){
            return password_hash($passwd,PASSWORD_ARGON2ID);
        }
        else{
            return password_hash($passwd, PASSWORD_DEFAULT);
        }    
    }
}
?>