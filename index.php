<?php
require __DIR__ .'/vendor/autoload.php';
session_start();

use App\Controllers\Request\RequestLogin;
use App\Controllers\Response\ResponseLogin;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//Solicita a Rota disponível
$Route = RequestLogin::Available_Routes();
$Content = ResponseLogin::Get_Content($Route);
//print_r($Route);
//print_r($Content);
echo $Content;

//echo "<pre>";
//echo RequestLogin::Available_Routes();
//print_r(RequestLogin::Available_Routes());
//echo "</pre>";


?>
