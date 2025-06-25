<?php
namespace App\Controllers\Response;

use App\Utilities\FileChecker;
use App\Utilities\FileReader;
use App\Utilities\FileRender;
use App\Config\Config;

//Tratando as Respostas das Requisições
class ResponseLogin{

    public static function Get_Content($Route){
        $checker = new FileChecker();
        $reader = new FileReader();
        $Render = new FileRender();
        $config = self::ini_file();

        if($Route=="/server-error"){
            $Content = $reader->Reader("/server-error500");
            http_response_code(500);
            return $Content;
        }
        else{
            if( $checker->FileVerify($Route)){
                $Content = $reader->Reader($Route);
                $Content = $Render->Render($Content,["CSSFILEPCLOCAL"=>$config["ENDERECO_LOCAL"].$config["CSSLINKLOGIN"].$Route.".css"]);
                $Content = $Render->Render($Content,["CSSFILEMOBILELOCAL"=>$config["ENDERECO_LOCAL"].$config["CSSLINKLOGIN"].$Route."-mobile.css"]);
                
                $Content = $Render->Render($Content,["PAGE_CADASTRO"=>$config["PAGE_CADASTRO"]]);
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

     private static function ini_file(){
        $config = new Config();
        return $config->Config_App();
    }

}
?>