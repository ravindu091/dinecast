<?php

require_once __DIR__ . '/../Models/Ingredient.php';
require_once __DIR__ . '/../Core/Controller.php';
class IngredientController extends Controller{
    
    public function __construct()
    {
        if(!isset($_SESSION["userId"])){
            http_response_code(401);
            exit();
        }
    }

    public function getBySku(array $param = []){
        if(isset($param['sku'])){
            $sku = $param['sku'];
            header('Content-Type: application/json');
            echo json_encode((new Ingredient())->getBySku($sku));
            exit();
        }
    }
}
