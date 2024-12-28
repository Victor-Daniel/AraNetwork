<?php
require_once __DIR__ .'/vendor/autoload.php';

use App\Controllers\Request\RequestLogin;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo RequestLogin::GetURI();


?>