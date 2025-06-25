<?php
namespace App\Utilities;

use App\Config\Config;

// Classe responsável por tratar a URL e trazer a URI Atual
class RouteProcessor{

    //Retornando a URI LOGIN
    public static function Get_URI_Login(){
        $URI = $_SERVER['REQUEST_URI'];
        $config = self::ini_file();
        $Current_URI = str_replace($config['Prefix_URI_Home'],"",$URI);
        $URI_Exploded = explode($config["Prefix_URI_Home"],$Current_URI);
        foreach($URI_Exploded as $key => $value){
            if($value != ""){
                $Current_URI = $value;
                //$Current_URI = explode($_ENV["Sufix_URI"],$Current_URI);
            }
            $URI = explode($config["Sufix_URI"],$Current_URI);
            foreach($URI as $Key => $Value){
                if($Value!=""){
                    $Current_URI=$Value;
                }                
            }

        }
        return $Current_URI;
    }

    //TRATANDO E RETORNANDO  URI CADASTRO
    public function Get_URI_Cadastro(){

        $URI = $_SERVER['REQUEST_URI'];
        $config = self::ini_file();
        $Current_URI = str_replace($config['Prefix_URI'],"",$URI);
        $URI_Exploded = explode($config["Prefix_URI"],$Current_URI);
        foreach($URI_Exploded as $key => $value){
            if($value != ""){
                $Current_URI = $value;
                //$Current_URI = explode($_ENV["Sufix_URI"],$Current_URI);
            }
            $URI = explode($config["Sufix_URI"],$Current_URI);
            foreach($URI as $Key => $Value){
                if($Value!=""){
                    $Current_URI=$Value;
                }                
            }
        }
        return $Current_URI;
    }

    //Leitor do arquivo Ini de configurações
    private static function ini_file(){
        $config = new Config();
        $info = $config->Config_App();
        return $info;
    }

}

?>