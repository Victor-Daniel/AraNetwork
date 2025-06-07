<?php
namespace App\API\Request\SafeData;

use PDO;
use PDOException;
use App\API\Request\SafeData\PasswordGenerator;

class CadastrarDados{

    public function Cadastrar_Usuario_CPF($Array){
        try{

            $conn = new PDO("mysql:host=".$_ENV["MYSQL_HOST"].";port=".$_ENV["MYSQL_PORT"].";dbname=".$_ENV["MYSQL_DATABASE"],$_ENV["MYSQL_USER_ROOT"],$_ENV["MYSQL_ROOT_PASSWORD"]);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //Data de atualização
            $data = date("d-m-Y");

            //Configurando padronização de senha

            $passwd = new PasswordGenerator();

            $comandoSQL="INSERT INTO usuario_pf(usuario,nome,cpf,rg,data_nasc,senha,email,telefone,celular,endereco,bairro,numero,complemento,uf,cep,data_atualizacao) VALUES (".$Array["usuario"].",".$Array["nome"].",".$Array["cpf"].",".$Array["rg"].",".$Array["data"].",".$passwd->GeradorSenhas($Array["passwd"]
            ).",".$Array["email"].",".$Array["telefone"].",".$Array["celular"].",".$Array["endereco"].",".$Array["bairro"].",".$Array["numero"].",".$Array["complemento"].",".$Array["uf"].",".$Array["cep"].",".$data.");";

            return  $comandoSQL;
        }
        catch(PDOException $e){
            return "Erro detectado: " . $e->getMessage();
        }
        
    }

    public function Cadastrar_Usuario_CNPJ($Array){
        
    }

}

?>