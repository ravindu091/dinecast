<?php

require_once __DIR__. '/../config/database.php';

class Ingredient{
    public function create(
        string $name,
        string $category,
        int $unitId,
        float $minimum,
        string $status,
        string $description
    ):bool{
        global $conn;

        $stmt = $conn->prepare('INSET INTO ingredients(name,category,UnitId,minimum,status,description) VALUES(?,?,?,?,?,?)');
        $stmt->bind_param('ssidss',$name,$category,$unitId,$minimum,$status,$description);

        return $stmt->execute();
    }
    public function getIngredient(){

    }

    public function getAllIngredients(){

    }

    public function getIngredientRange(int $range){

    }
    public function update(){

    }

    public function delete(){

    }


}