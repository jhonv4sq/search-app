<?php

namespace App\Core;

use PDO;
use PDOException;

class Database {
    protected $pdo;

    public function __construct() {
        try {
            $this->pdo = $this->getConnection();
        } catch (PDOException $error) {
            print_r($error->getMessage());
        }
    }

    private function getConnection(): PDO {
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];

        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public function executeQuery(string $query, array $params = []): bool {
        try {
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute($params);

        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
            return false;
        }
    }

    public function fetchData(string $query, array $params = []): array {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
            return [];
        }
    }

    public function checkConnection() {
        try {
            $db = $this->getConnection();
            return true;
        } catch (PDOException $error) {
            print_r($error->getMessage());
        }
    }
}
