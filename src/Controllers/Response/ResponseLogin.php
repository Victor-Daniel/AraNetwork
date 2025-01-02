<?php
namespace App\Controllers\Response;

use App\Utilities\FileChecker;
use App\Utilities\FileReader;
//Tratando as Respostas das Requisições
class ResponseLogin{

    public static function Get_Content($Route){
        $checker = new FileChecker();
        if( $checker->FileVerify($Route)){
            
        }
        else{

        }
        return "";
    }

}
?>