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
        if( $checker->FileVerify($Route)){
             $Content = $reader->Reader($Route);
             $Content = $Render->Render($Content,["CSSFILE"=>$_ENV["ENDERECO_LOCAL"].$_ENV["CSSLINK"].$Route.".css"]);
             http_response_code(200);
             return $Content;
        }
        else{
            http_response_code(404);
            return "";
        }
        
    }

}
?>