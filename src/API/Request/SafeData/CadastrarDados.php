<?php
namespace App\API\Request\SafeData;

use PDO;
use PDOException;
use App\API\Request\SafeData\PasswordGenerator;
use Dotenv\Util\Regex;

class CadastrarDados{


    public function Cadastrar_Usuario_CPF($Array){
        
        try{

            $conn = new PDO("mysql:host=mysql-AraNetwork;port=3306;dbname=ara_db","root","HwWin10A.1");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            

            //Data de atualização
            $dataAgora = date("d-m-Y");

            //Configurando padronização de senha

            $pass = new PasswordGenerator();

            // Iniciando as inserções de informações de cadastro

            $senhaSegura = $pass->GeradorSenhas($Array["passwd"]);

            $sql = "INSERT INTO usuarios_pf (
            nome, usuario, passwd, email, cpf, rg, celular, data_nasc, endereco,
            bairro, complemento, numero, cidade, uf, cep, data_atualizacao_reg
            ) VALUES (
            :nome, :usuario, :passwd, :email, :cpf, :rg, :celular, :data_nasc, :endereco,
            :bairro, :complemento, :numero, :cidade, :uf, :cep, :data_atualizacao
            );";

            $comando = $conn->prepare($sql);
            $comando->execute([
                ':nome' => $Array["nome"],
                ':usuario' => $Array["usuario"],
                ':passwd' => $senhaSegura,
                ':email' => $Array["email"],
                ':cpf' => $Array["cpf"],
                ':rg' => $Array["rg"],
                ':celular' => $Array["celular"],
                ':data_nasc' => $Array["data"], // já deve estar em d-m-Y
                ':endereco' => $Array["endereco"],
                ':bairro' => $Array["bairro"],
                ':complemento' => $Array["complemento"],
                ':numero' => $Array["numero"],
                ':cidade' => $Array["cidade"],
                ':uf' => $Array["uf"],
                ':cep' => $Array["cep"],
                ':data_atualizacao' => $dataAgora
            ]);

           return 205;
            
        }
        catch(PDOException $e){
            return "Erro ao salvar registro: " . $e->getMessage();
        }
        
    }

    public function Cadastrar_Usuario_CNPJ($Array){
        
    }

    public function Verificar_Cadastro_PF($CPF){

        $info = array("code"=>0,"msg"=>"");

        try{
            $conn = new PDO("mysql:host={$_ENV[MYSQL_HOST]};port={$_ENV[MYSQL_PORT]};dbname={$_ENV[MYSQL_DATABASE]}","{$_ENV[MYSQL_USER_ROOT]}","{$_ENV[MYSQL_ROOT_PASSWORD]}");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT cpf FROM usuarios_pf WHERE cpf = :cpf";

            $comando = $conn->prepare($sql);
            $comando->execute([":cpf"=>$CPF]);

            $result = $comando->fetch(PDO::FETCH_ASSOC);

            if(is_array($result)){
                if($result["cpf"]==$CPF){
                    $info["code"]=200;
                    $info["teste"] = $_ENV["MYSQL_HOST"];
                    return $info;
                }
            }
            else{
                $info["code"]=404;
                return $info;
            }

        }
        catch(PDOException $e)
        {
            $info["code"]=500;
            $info["msg"]= $e->getMessage();
           return $info;
        }
    }

}

?>