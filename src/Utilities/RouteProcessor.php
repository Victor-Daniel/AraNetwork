<?php
namespace App\Utilities;

class RouteProcessor{
    public static function Get_URI(){
        $URI = $_SERVER['REQUEST_URI'];
        return $URI;
    }
}

?>