<?php
namespace App\API\Request;

use App\API\Request\RouterProcessorAPI;

class RoutesAPI{

    public static function Available_Routes(){
        $routes = array(
            "RequestCadastro"=>"/CadastrarDados",
            "/RequestCadastro"=>"/CadastrarDados"
        );

        $route = new RouterProcessorAPI();

        $current_route = $route ->Get_URI_API();
        if(array_key_exists($current_route,$routes)){
            $current_route = $routes[$current_route];

            return ["Route"=>$current_route,"Code"=>200];
        }
        else{
            return ["Error"=>"Servidor não possui rota disponível!","Code"=>500];
        }

    }

    public static function Get_ContentType_API(){
        if($_SERVER["CONTENT_TYPE"]!="application/json"){
            return array("msg"=>"Erro no Content-Type","code"=>415);
        }
        else{
            return array("msg"=>"Requisicao bem-sucedida!","code"=>200);
        }
    }

}

?>