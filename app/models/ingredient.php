<?php

require_once __DIR__."/../config/database.php";

class Ingredient{
    private PDO $conn;

    public function __construct()
    {
        $database = new Database();

        $this->conn = $database->getConnection();
    }
    public function create(
        string $name,
        string $category,
        string $unitName,
        float $minimum,
        string $status,
        string $description,
        float $currentStock
    ):bool{
       

        $stmt = $this->conn->prepare('INSERT INTO ingredients(name,category,unitName,minimum,status,description,currentStock)
         VALUES(:name,:category,:unitName,:minimum,:status,:description,:currentStock)');
       

        return $stmt->execute([
            ':name' => $name,
            ':category' => $category,
            ':unitName' => $unitName,
            ':minimum' => $minimum,
            ':status' => $status,
            ':description' => $description,
            ':currentStock' => $currentStock
        ]);
    }

    public function getAllIngredients(){
        $stmt = $this->conn->prepare("SELECT * FROM ingredients ORDER BY id DESC");

        $stmt->execute();

        return $stmt->fetchAll();
    }

}