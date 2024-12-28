<?php
require __DIR__ .'/vendor/autoload.php';

use App\Controllers\Request\RequestLogin;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo "<pre>";
echo RequestLogin::Available_Routes();
echo "</pre>";


?>