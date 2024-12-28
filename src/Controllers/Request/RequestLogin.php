<?php
namespace App\Controllers\Request;

use App\Utilities\RouteProcessor;


class RequestLogin{
    public static function Available_Routes(){
        $routes = array(
            "/"=>"/login",
            "/login"=>"/login"
        );

        $route = new RouteProcessor();
        return $route->Get_URI();
    }
}
?>