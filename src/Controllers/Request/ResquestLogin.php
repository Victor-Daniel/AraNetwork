<?php
namespace App\Controllers\Request;

class RequestLogin{
    public static function GetURI(){
        return $_SERVER["REQUEST_URI"];
    }
}

?>