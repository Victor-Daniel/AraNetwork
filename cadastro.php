<?php

require __DIR__ .'/vendor/autoload.php';
session_start();

use App\Controllers\Request\RequestCadastro;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//SOLICITA A ROTA DISPONÍVEL
$Route  = new RequestCadastro();
echo $Route->Available_Routes();

?>