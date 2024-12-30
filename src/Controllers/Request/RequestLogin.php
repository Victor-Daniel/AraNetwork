<?php
namespace App\Controllers\Request;

use App\Utilities\RouteProcessor;

// Tratando as Requisições de Login
class RequestLogin{

    //Retornando a Rota de Login
    public static function Available_Routes(){
        $routes = array(
            "/"=>"/login",
            "/login"=>"/login"
        );
        $route = new RouteProcessor();
        $current_route = $route->Get_URI_Login();
        if(array_key_exists($current_route, $routes)){
            $current_route = $routes[$current_route];
        }
        return $current_route;
    }
}
?>