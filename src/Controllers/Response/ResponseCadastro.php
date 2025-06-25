<?php

namespace App\Controllers\Response;

use App\Utilities\FileChecker;
use App\Utilities\FileReader;
use App\Utilities\FileRender;
use App\Config\Config;

class ResponseCadastro{


    public static function Get_Content($Route){
        $checker = new FileChecker();
        $reader = new FileReader();
        $Render = new FileRender();
        if($Route=="/server-error"){
            $Content = $reader->Reader("/server-error500");
            http_response_code(500);
            return $Content;
        }
        else{
            if($checker->FileVerify($Route)){

                $config = self::ini_file();
                $Content = $reader->Reader($Route);
                $Content = $Render->Render($Content,["CSSFILEPCLOCAL"=>$config["ENDERECO_LOCAL"].$config["CSSLINKCADASTRO"].$Route.".css"]);
                $Content = $Render->Render($Content,["CSSFILEMOBILELOCAL"=>$config["ENDERECO_LOCAL"].$config["CSSLINKCADASTRO"].$Route."-mobile.css"]);
               
                $Content = $Render->Render($Content,["JSCADASTROIP"=>$config["ENDERECO_IP"].$config["CADASTROJS"].".js"]);
                $Content = $Render->Render($Content,["JSFNCADASTROIP"=>$config["ENDERECO_IP"].$config["FNCADASTROJS"].".js"]);
                $Content = $Render->Render($Content,["JSCONFIG"=>$config["ENDERECO_IP"].$config["CADASTROCONFIGJS"].".js"]);
                http_response_code(200);
                return $Content;
            }
            else{
                $Content = $reader->Reader("/erro-page404");
               http_response_code(404);
               return $Content;
            }
        }
    }

    // Inicializador do arquivo ini de configurações
    private static function ini_file(){
        $config = new Config();
        return $config->Config_App();
    }
}

?>