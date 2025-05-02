<?php
namespace App\API\Request\SafeData;

class CadastrarDados{
    private $nome,$user,$pwd,$email,$RG,$CPF,$CNPJ,$tel,$cel,$data;

    public function __construct($nome,$user,$pwd,$email,$RG,$CPF,$CNPJ,$tel,$cel,$data)
    {
        $this->nome = $nome;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->email = $email;
        $this->RG = $RG;
        $this->CPF = $CPF;
        $this->CNPJ = $CNPJ;
        $this->tel = $tel;
        $this->cel = $cel;
        $this->data = $data;
    }
}

?>