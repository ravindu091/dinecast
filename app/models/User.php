<?php
require_once __DIR__ .'/../Core/Database.php';
class User{
    private PDO $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getUserByUsername(string $username){

        $stmt = $this->conn->prepare('SELECT * FROM users WHERE username = :username ');
        $stmt->execute([
            ":username" => $username
        ]);

        return $stmt->fetch();
    }
}