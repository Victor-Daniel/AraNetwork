<?php
namespace App\Config;

define('localfile_config','/etc/aranetwork_config/ara-config.ini');

class Config{

    // Retorna os valores de configurações de links padrão
    public function Config_App(){
        $config = parse_ini_file(localfile_config,true);
        return $config['app'];       
    }

}
?>