<?php
use Dotenv\Dotenv;
use App\Core\Database;

// Carga autoload
require("vendor/autoload.php");

// Carga las variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$checkDb = new Database();

if ($checkDb->checkConnection() === true) {
    // Carga las rutas
    $router = require 'src/Routes/routes.php';

    // Cargar la vista de la ruta en la que estamos
    $uri = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];
    $router->resolve($method, $uri);
}
?>
