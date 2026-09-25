<?php

require_once __DIR__."/../core/Database.php";

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

    public function getNearMinimumStockCount(array $ingredients){
        $bellowMin = 0;
        $redZone = 0;
        foreach($ingredients as $ingredient){
            if($ingredient['currentStock'] < ($ingredient['minimum']/2)){
                $bellowMin++;
                $redZone++;
            }else if($ingredient['currentStock'] <$ingredient['minimum']){
                $bellowMin++;
            }
        }

        return [
            'bellowMin'=> $bellowMin,
            'redZone'=> $redZone
        ];
    }

    public function updateIngredient(
        int $id,
        string $name,
        string $category,
        string $unitName,
        float $minimum,
        string $status,
        string $description,
        float $currentStock
    ){
        $stmt = $this->conn->prepare("UPDATE ingredients SET 
        name = :name,
        category = :category,
        unitName = :unitName,
        minimum = :minimum,
        status = :status,
        description = :description,
        currentStock = :currentStock
         WHERE id = :id" );

        return $stmt->execute([
            ':id' => $id,
            ':name'=> $name,
            ':category'=>$category,
            ':unitName'=>$unitName,
            ':minimum'=>$minimum,
            ':status'=> $status,
            ':description'=>$description,
            ':currentStock'=>$currentStock

        ]);
        
    }

    public function deleteIngredient(int $id){

        $stmt = $this->conn->prepare('DELETE FROM ingredients WHERE id = :id');

        return $stmt->execute([
            'id'=>$id
        ]);
    }

}