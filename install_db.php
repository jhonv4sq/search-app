<?php
use Dotenv\Dotenv;

require("vendor/autoload.php");

// Carga las variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = file_get_contents('src/Sql/database.sql');
    $pdo->exec($sql);

    echo "Database installed correctly";

} catch (PDOException $error) {
    echo "Error: " . $error->getMessage() . "\n";
}

?>
