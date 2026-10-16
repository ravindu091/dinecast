<?php
require_once __DIR__."/../Core/Database.php";

class Category{
    private PDO $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }


    public function getAllCategory(){
        $stmt = $this->conn->prepare("SELECT * FROM category ORDER BY name ASC");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}