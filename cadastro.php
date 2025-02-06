<?php

require __DIR__ .'/vendor/autoload.php';
session_start();

use App\Controllers\Request\RequestCadastro;
use App\Controllers\Response\ResponseCadastro;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//SOLICITA A ROTA DISPONÍVEL
$Route = RequestCadastro::Available_Routes();
echo ResponseCadastro::Get_Content($Route);

?>