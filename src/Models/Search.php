<?php

namespace App\Models;
use App\Core\Database;

class Search {
    private ?int $id = null;
    private string $text;
    private Database $db;

    public function __construct(String $text = "") {
        $this->text = $text;
        $this->db = new Database();
    }

    public function create(): bool {
        $query = "INSERT INTO searches (text) VALUES (:text)";
        $params = array(
            'text' => $this->text
        );
        return $this->db->executeQuery($query, $params);
    }

    public function showAll(): array {
        $query = "SELECT * FROM searches";
        return $this->db->fetchData($query);
    }
}
