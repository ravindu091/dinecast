<?php

require_once __DIR__."/../config/database.php";

class Ingredient{
    private mysqli $conn;

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
       

        $stmt = $this->conn->prepare('INSERT INTO ingredients(name,category,unitName,minimum,status,description,currentStock) VALUES(?,?,?,?,?,?,?)');
        $stmt->bind_param('sssdssd',$name,$category,$unitName,$minimum,$status,$description,$currentStock);

        return $stmt->execute();
    }
    public function getIngredient(){
        $stmt = $this->conn->prepare("SELECT * FROM ingredients");
        
        $stmt->execute();

        return $stmt->get_result();
    }

    public function getAllIngredients(){

    }

    public function getIngredientRange(int $range){

    }
    public function update(){

    }

    public function delete(){

    }

    public function getUnits(){
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM unit_of_measure');

        $stmt->execute();

        return $stmt->get_result();
    }
}