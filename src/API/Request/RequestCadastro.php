<?php
    require __DIR__."../../../../vendor/autoload.php";

    use App\API\Request\SafeData\CadastrarDados;
    use App\API\Request\RoutesAPI;
    use Dotenv\Parser\Entry;

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    header("Content-Type: application/json");

    //Verificando o Content-Type da requisição
    $ContentRequest= RoutesAPI::Get_ContentType_API();

    if($ContentRequest["code"]==200){
        // Caso o Content-Type estiver correto, inicializa o processo de processamento da requisição (Dados).
        http_response_code($ContentRequest["code"]);
        $input = file_get_contents("php://input");
        $dados = json_decode($input,true);

        $result = array("redirecinamento_url"=>"",
                        "Code"=>"",);

        // Sanitizando as informações recebidas
        if(array_key_exists("cpf",$dados)){
            $dados["nome"] = htmlspecialchars($dados["nome"],ENT_QUOTES,"UTF-8");
            $dados["usuario"] = htmlspecialchars($dados["usuario"],ENT_QUOTES,"UTF-8");
            $dados["passwd"] = htmlspecialchars($dados["passwd"],ENT_QUOTES,"UTF-8");
            $dados["email"] = filter_var( $dados["email"],FILTER_SANITIZE_EMAIL);
            $dados["cpf"] = htmlspecialchars($dados["cpf"],ENT_QUOTES,"UTF-8");
            $dados["rg"] = htmlspecialchars($dados["rg"],ENT_QUOTES,"UTF-8");
            $dados["telefone"] = htmlspecialchars($dados["telefone"],ENT_QUOTES,"UTF-8");
            $dados["celular"] = htmlspecialchars($dados["celular"],ENT_QUOTES,"UTF-8");
            $dados["data"] = htmlspecialchars($dados["data"],ENT_QUOTES,"UTF-8");
            $dados["endereco"] = htmlspecialchars($dados["endereco"],ENT_QUOTES,"UTF-8");
            $dados["bairro"] = htmlspecialchars($dados["bairro"],ENT_QUOTES,"UTF-8");
            $dados["complemento"] = htmlspecialchars($dados["complemento"],ENT_QUOTES,"UTF-8");
            $dados["numero"] = htmlspecialchars($dados["numero"],ENT_QUOTES,"UTF-8");
            $dados["uf"] = htmlspecialchars($dados["uf"],ENT_QUOTES,"UTF-8");
            $dados["cep"] = htmlspecialchars($dados["cep"],ENT_QUOTES,"UTF-8");
            
            // Iniciando cadastro de pessoa Física.
            $cadastrar = new CadastrarDados();
            $insert_result= $cadastrar->Cadastrar_Usuario_CPF($dados);

            //result["conect"] = $insert_result;
            $result["Teste"] = $insert_result;
        }
        if(array_key_exists("cnpj",$dados)){

            //Tratando os dados do CNPJ
            $dados["nome"] = htmlspecialchars($dados["nome"],ENT_QUOTES,"UTF-8");
            $dados["usuario"] = htmlspecialchars($dados["usuario"],ENT_QUOTES,"UTF-8");
            $dados["passwd"] = htmlspecialchars($dados["passwd"],ENT_QUOTES,"UTF-8");
            $dados["passwd"] = htmlspecialchars($dados["passwd"],ENT_QUOTES,"UTF-8");
            $dados["email"] = filter_var( $dados["email"],FILTER_SANITIZE_EMAIL);
            $dados["cnpj"] = htmlspecialchars($dados["cnpj"],ENT_QUOTES,"UTF-8");
            $dados["telefone"] = htmlspecialchars($dados["telefone"],ENT_QUOTES,"UTF-8");
            $dados["celular"] = htmlspecialchars($dados["celular"],ENT_QUOTES,"UTF-8");
            $dados["endereco"] = htmlspecialchars($dados["endereco"],ENT_QUOTES,"UTF-8");
            $dados["bairro"] = htmlspecialchars($dados["bairro"],ENT_QUOTES,"UTF-8");
            $dados["complemento"] = htmlspecialchars($dados["complemento"],ENT_QUOTES,"UTF-8");
            $dados["numero"] = htmlspecialchars($dados["numero"],ENT_QUOTES,"UTF-8");
            $dados["uf"] = htmlspecialchars($dados["uf"],ENT_QUOTES,"UTF-8");
            $dados["cep"] = htmlspecialchars($dados["cep"],ENT_QUOTES,"UTF-8");

            $result["Nome"] = $dados["nome"];
            $result["senha"] = $dados["passwd"];
        }
 
        echo json_encode($result);
    }
    else{

        //Caso o Content-Type seja errado, retornará codigo 415
        http_response_code($ContentRequest["code"]);
        echo json_encode($ContentRequest);
    }
?>