<?php
namespace App\Utilities;

// Classe responsável por tratar a URL e trazer a URI Atual
class RouteProcessor{

    //Retornando a URI
    public static function Get_URI_Login(){
        $URI = $_SERVER['REQUEST_URI'];
        $Current_URI = str_replace(getenv('Prefix_URI'),"",$URI);
        $URI_Exploded = explode($_ENV["Prefix_URI"],$Current_URI);
        foreach($URI_Exploded as $key => $value){
            if($value != ""){
                $Current_URI = $value;
                //$Current_URI = explode($_ENV["Sufix_URI"],$Current_URI);
            }
            $URI = explode($_ENV["Sufix_URI"],$Current_URI);
            foreach($URI as $Key => $Value){
                if($Value!=""){
                    $Current_URI=$Value;
                }                
            }
        }
        return $Current_URI;
    }

    public function Get_URI_Cadastro(){

        $URI = $_SERVER['REQUEST_URI'];
        $Current_URI = str_replace(getenv('Prefix_URI'),"",$URI);
        $URI_Exploded = explode($_ENV["Prefix_URI"],$Current_URI);
        foreach($URI_Exploded as $key => $value){
            if($value != ""){
                $Current_URI = $value;
                //$Current_URI = explode($_ENV["Sufix_URI"],$Current_URI);
            }
            $URI = explode($_ENV["Sufix_URI"],$Current_URI);
            foreach($URI as $Key => $Value){
                if($Value!=""){
                    $Current_URI=$Value;
                }                
            }
        }
        return $Current_URI;
    }
}

?>