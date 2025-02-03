<?php
namespace App\Controllers\Response;

use App\Utilities\FileChecker;
use App\Utilities\FileReader;
use App\Utilities\FileRender;


//Tratando as Respostas das Requisições
class ResponseLogin{

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
            if( $checker->FileVerify($Route)){
                $Content = $reader->Reader($Route);
                $Content = $Render->Render($Content,["CSSFILEPCLOCAL"=>$_ENV["ENDERECO_LOCAL"].$_ENV["CSSLINK"].$Route.".css"]);
                $Content = $Render->Render($Content,["CSSFILEMOBILELOCAL"=>$_ENV["ENDERECO_LOCAL"].$_ENV["CSSLINK"].$Route."-mobile.css"]);
                $Content = $Render->Render($Content,["CSSFILEPCLOCALIP"=>$_ENV["ENDERECO_IP"].$_ENV["CSSLINK"].$Route.".css"]);
                $Content = $Render->Render($Content,["CSSFILEMOBILELOCALIP"=>$_ENV["ENDERECO_IP"].$_ENV["CSSLINK"].$Route."-mobile.css"]);
                $Content = $Render->Render($Content,["CSSFILEURL"=>$_ENV["ENDERECO_URL"].$_ENV["CSSLINK"].$Route.".css"]);
                $Content = $Render->Render($Content,["CSSFILEMOBILEURL"=>$_ENV["ENDERECO_URL"].$_ENV["CSSLINK"].$Route."-mobile.css"]);
                $Content = $Render->Render($Content,["PAGE_CADASTRO"=>$_ENV["PAGE_CADASTRO"]]);
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

}
?>