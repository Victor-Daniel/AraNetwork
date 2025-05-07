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
        http_response_code(200);
        $input = file_get_contents("php://input");

        $dados = json_decode($input);
        
        // Falta terminar a tratativa dos dados;

        echo json_encode(array("msg"=>"Requisicao bem-sucedida!","code"=>200));
    }
    else{
        http_response_code(415);
        echo json_encode(array("msg"=>"Content-Type errado!","code"=>415));
    }
?>