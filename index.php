<?php
require __DIR__ .'/vendor/autoload.php';

use App\Controllers\Request\RequestLogin;
use App\Controllers\Response\ResponseLogin;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//Solicita a Rota disponível
$Route = RequestLogin::Available_Routes();
$Content = ResponseLogin::Get_Content($Route);

//echo "<pre>";
//echo RequestLogin::Available_Routes();
//print_r(RequestLogin::Available_Routes());
//echo "</pre>";


?>
