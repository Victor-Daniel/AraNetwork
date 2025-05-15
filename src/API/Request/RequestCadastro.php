<?php
    require __DIR__."../../../../vendor/autoload.php";

    use App\API\Request\SafeData\CadastrarDados;
    use App\API\Request\RoutesAPI;

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

        if(array_key_exists("cpf",$dados)){
            $Cadastrar_Dados = new CadastrarDados($dados["nome"],$dados["usuario"],$dados["passwd"],$dados["email"],$dados["telefone"],$dados["celular"],$dados["data"]);
            $ContentRequest = $Cadastrar_Dados->Cadastrar_Usuario_CPF($dados["rg"],$dados["cpf"]);
        }
        if(array_key_exists("cnpj",$dados)){

        }
        
        echo json_encode($ContentRequest);
    }
    else{

        //Caso o Content-Type seja errado, retornará codigo 415
        http_response_code($ContentRequest["code"]);
        echo json_encode($ContentRequest);
    }
?>