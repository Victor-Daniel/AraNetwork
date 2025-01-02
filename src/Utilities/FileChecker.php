<?php
namespace App\Utilities;

class FileChecker{

    public function FileVerify($filename){
        $default_path = __DIR__."../../Controllers/View".$filename.".html";
        if(file_exists($default_path)){
            return true;
        }
        else{
            return false;
        }
    }
}

?>