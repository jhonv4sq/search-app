<?php
use Dotenv\Dotenv;

require("vendor/autoload.php");

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = require 'src/Routes/routes.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->resolve($method, $uri);

// require("src/Views/layouts/app.php");
?>
