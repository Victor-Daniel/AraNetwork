<?php
namespace App\API\Request\SafeData;

use PDO;
use PDOException;
use App\API\Request\SafeData\PasswordGenerator;
use Dotenv\Util\Regex;

define('localfile_conection','/etc/mysql-conection/data-config.ini');

class CadastrarDados{

    public function Cadastrar_Usuario_CPF($Array){
        
        try{
             $config = parse_ini_file(localfile_conection,true);
             
            $strconection = "mysql:host=" . $config['database']['MYSQL_HOST'] . ";port=". $config['database']['MYSQL_PORT'] . ";dbname=" . $config['database']['MYSQL_DATABASE'];
            
            $conn = new PDO($strconection,$config['database']['MYSQL_USER_ROOT'], $config['database']['MYSQL_ROOT_PASSWORD']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            

            //Data de atualização
            $dataAgora = date("d-m-Y");

            //Configurando padronização de senha

            $pass = new PasswordGenerator();

            // Iniciando as inserções de informações de cadastro

            $senhaSegura = $pass->GeradorSenhas($Array["passwd"]);

            $sql = "INSERT INTO usuarios_pf (
            nome, usuario, passwd, email, cpf, rg, celular, data_nasc, endereco,
            bairro, complemento, numero, cidade, uf, cep
            ) VALUES (
            :nome, :usuario, :passwd, :email, :cpf, :rg, :celular, :data_nasc, :endereco,
            :bairro, :complemento, :numero, :cidade, :uf, :cep
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
            $config = parse_ini_file(localfile_conection,true);

            $strconection = "mysql:host=" . $config['database']['MYSQL_HOST'] . ";port=" . $config['database']['MYSQL_PORT'] . ";dbname=" . $config['database']['MYSQL_DATABASE'];
            $conn = new PDO($strconection,$config['database']['MYSQL_USER_ROOT'], $config['database']['MYSQL_ROOT_PASSWORD']);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT cpf FROM usuarios_pf WHERE cpf = :cpf";

            $comando = $conn->prepare($sql);
            $comando->execute([":cpf"=>$CPF]);

            $result = $comando->fetch(PDO::FETCH_ASSOC);

            if(is_array($result)){
                if($result["cpf"]==$CPF){
                    $info["code"]=200;
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