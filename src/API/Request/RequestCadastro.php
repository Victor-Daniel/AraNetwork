<?php
    require __DIR__."../../../../vendor/autoload.php";

    use App\API\Request\SafeData\CadastrarDados;
    use App\API\Request\RoutesAPI;
    use Dotenv\Parser\Entry;

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    //Só aceita Conteúdos Json
    header("Content-Type: application/json");

    //Verificando o Content-Type da requisição
    $ContentRequest= RoutesAPI::Get_ContentType_API();

    // Verificando ROTAS disponiveis
    $RotaDisp = RoutesAPI::Available_Routes();

    // Falta trabalhar mais essa Rota disponivel e validar as rotas junto com o content-type.

    if($ContentRequest["code"]==200){

        // Caso o Content-Type estiver correto, inicializa o processo de processamento da requisição (Dados).
        $input = file_get_contents("php://input");
        $dados = json_decode($input,true);
        http_response_code($ContentRequest["code"]);



        // Sanitizando as informações recebidas
        if(array_key_exists("cpf",$dados)){
            $dados["nome"] = htmlspecialchars($dados["nome"],ENT_QUOTES,"UTF-8");
            $dados["usuario"] = htmlspecialchars($dados["usuario"],ENT_QUOTES,"UTF-8");
            $dados["passwd"] = htmlspecialchars($dados["passwd"],ENT_QUOTES,"UTF-8");
            $dados["email"] = filter_var( $dados["email"],FILTER_SANITIZE_EMAIL);
            $dados["cpf"] = htmlspecialchars($dados["cpf"],ENT_QUOTES,"UTF-8");
            $dados["rg"] = htmlspecialchars($dados["rg"],ENT_QUOTES,"UTF-8");
            $dados["cidade"] = htmlspecialchars($dados["cidade"],ENT_QUOTES,"UTF-8");
            $dados["celular"] = htmlspecialchars($dados["celular"],ENT_QUOTES,"UTF-8");
            $dados["data"] = htmlspecialchars($dados["data"],ENT_QUOTES,"UTF-8");
            $dados["endereco"] = htmlspecialchars($dados["endereco"],ENT_QUOTES,"UTF-8");
            $dados["bairro"] = htmlspecialchars($dados["bairro"],ENT_QUOTES,"UTF-8");
            $dados["complemento"] = htmlspecialchars($dados["complemento"],ENT_QUOTES,"UTF-8");
            $dados["numero"] = htmlspecialchars($dados["numero"],ENT_QUOTES,"UTF-8");
            $dados["uf"] = htmlspecialchars($dados["uf"],ENT_QUOTES,"UTF-8");
            $dados["cep"] = htmlspecialchars($dados["cep"],ENT_QUOTES,"UTF-8");
            
            $Cadastrar = new CadastrarDados();

            //echo json_encode($Cadastrar->Verificar_Cadastro_PF($dados["cpf"]));

           $result = $Cadastrar->Verificar_Cadastro_PF($dados["cpf"]);
            if($result["code"]==404){
                $result = $Cadastrar->Cadastrar_Usuario_CPF($dados);
                if($result==205){
                    echo json_encode([
                    "code"=>$result,
                    "msg"=>"Cadastro realizado com Sucesso!",
                    "next_link"=>""
                ]);
                }
                else{
                    echo json_encode([
                    "code"=>500,
                    "msg"=>$Cadastrar->Cadastrar_Usuario_CPF($dados),
                    "next_link"=>""
                ]);
                }
            }
            elseif($result["code"]==200){
                echo json_encode([
                    "code"=>200,
                    "msg"=>"Usuario encontrado!",
                    "next_link"=>""
                ]);
            }
            
        }
        if(array_key_exists("cnpj",$dados)){

            //Tratando os dados do CNPJ
            $dados["nome"] = htmlspecialchars($dados["nome"],ENT_QUOTES,"UTF-8");
            $dados["usuario"] = htmlspecialchars($dados["usuario"],ENT_QUOTES,"UTF-8");
            $dados["passwd"] = htmlspecialchars($dados["passwd"],ENT_QUOTES,"UTF-8");
            $dados["passwd"] = htmlspecialchars($dados["passwd"],ENT_QUOTES,"UTF-8");
            $dados["email"] = filter_var( $dados["email"],FILTER_SANITIZE_EMAIL);
            $dados["cnpj"] = htmlspecialchars($dados["cnpj"],ENT_QUOTES,"UTF-8");
            $dados["cidade"] = htmlspecialchars($dados["cidade"],ENT_QUOTES,"UTF-8");
            $dados["celular"] = htmlspecialchars($dados["celular"],ENT_QUOTES,"UTF-8");
            $dados["endereco"] = htmlspecialchars($dados["endereco"],ENT_QUOTES,"UTF-8");
            $dados["bairro"] = htmlspecialchars($dados["bairro"],ENT_QUOTES,"UTF-8");
            $dados["complemento"] = htmlspecialchars($dados["complemento"],ENT_QUOTES,"UTF-8");
            $dados["numero"] = htmlspecialchars($dados["numero"],ENT_QUOTES,"UTF-8");
            $dados["uf"] = htmlspecialchars($dados["uf"],ENT_QUOTES,"UTF-8");
            $dados["cep"] = htmlspecialchars($dados["cep"],ENT_QUOTES,"UTF-8");

            

        }

    }     
    else{

        //Caso o Content-Type seja errado, retornará codigo 415
        http_response_code($ContentRequest["code"]);
        echo json_encode($ContentRequest);
    }

?>