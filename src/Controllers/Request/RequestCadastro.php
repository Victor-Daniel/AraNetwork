<?php
namespace App\Controllers\Request;

use App\Utilities\RouteProcessor;

//TRATANDO REQUISIÇÕES DA PÁGINA CADASTRO

class RequestCadastro{
    //Retornando a Rota de Cadastro Ou de Error
    public function Available_Routes(){
        $routes = array(
            "cadastro"=>"/cadastro",
            "/cadastro"=>"/cadastro"
        );

        $route = new RouteProcessor();
        $current_route = $route->Get_URI_Cadastro();
        if(array_key_exists($current_route, $routes)){
            $current_route = $routes[$current_route];
        }
        else{
            $current_route = "/server-error";
        }
        return $current_route;
    }
}

?>