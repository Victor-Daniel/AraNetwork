<?php
    require __DIR__."../../../../vendor/autoload.php";

    use App\API\Request\SafeData\CadastrarDados;
    use App\API\Request\RoutesAPI;

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $Route = RoutesAPI::Available_Routes();
    if($Route["Code"]==200){
        //$Dados = new CadastrarDados();

    }
    

?>