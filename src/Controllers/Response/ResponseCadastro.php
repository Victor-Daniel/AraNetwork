<?php

namespace App\Controllers\Response;

use App\Utilities\FileChecker;
use App\Utilities\FileReader;
use App\Utilities\FileRender;

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
                $Content = $reader->Reader($Route);
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