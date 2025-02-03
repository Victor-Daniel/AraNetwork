<?php
namespace App\Controllers\Request;

use App\Utilities\RouteProcessor;

// Tratando as Requisições de Login
class RequestLogin{

    //Retornando a Rota de Login Ou de Error
    public static function Available_Routes(){
        $routes = array(
            "/"=>"/login",
            "/login"=>"/login",
            'login'=>"/login"
        );

        $route = new RouteProcessor();
        $current_route = $route->Get_URI_Login();
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