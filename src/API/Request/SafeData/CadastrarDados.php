<?php
namespace App\API\Request\SafeData;

use mysqli;

class CadastrarDados{
    private $nome,$user,$pwd,$email,$RG,$CPF,$CNPJ,$tel,$cel,$data;

    private $Conection;

    public function __construct($nome,$user,$pwd,$email,$tel,$cel,$data)
    {
        $this->nome = $nome;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->email = $email;
        $this->tel = $tel;
        $this->cel = $cel;
        $this->data = $data;

    }


    public function Cadastrar_Usuario_CPF($RG,$CPF){
        $this->Conection = new mysqli();
    }
}

?>