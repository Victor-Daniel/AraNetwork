<?php

require __DIR__ .'/vendor/autoload.php';
session_start();

use App\Controllers\Request\RequestLogin;
use App\Controllers\Response\ResponseLogin;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$Route = RequestLogin::Available_Routes();

echo $Route;

//echo "<pre>";
//print_r($Route);
//echo "</pre>";

//echo $URI_Exploded[0];

?>