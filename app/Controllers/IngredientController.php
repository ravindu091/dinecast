<?php
require_once __DIR__ . "/../Core/Controller.php";
require_once __DIR__ . '/../models/ingredient.php';

class IngredientController extends Controller{
    private $authRoleList = ['store' , 'kitchen'];
    public function __construct()
    {
        if(!isset($_SESSION['userId']) ){
            http_response_code(401);
            exit("Unauthorized");
        }

        if(!isset($_SESSION['role']) || !in_array($_SESSION['role'] , $this->authRoleList ,true)){
            http_response_code(403);
            exit("Forbidden");
        }
    }

    public function createIngredient(array $param = [])
    {
        //get data
        if (isset($_POST['name']) && trim($_POST['name']) !== '') {

            $name = trim($_POST['name']);
            $category = $_POST['category'] ?? '';
            $uom = $_POST['uom'] ?? '';
            $minimumStock = (float) ($_POST['min_stock'] ?? 0);
            $status = $_POST['status'] ?? 'Active';
            $description = trim($_POST['description'] ?? '');
            $currentStock = (float) ($_POST['current_stock'] ?? 0);

            require_once __DIR__ . '/../models/ingredient.php';

            $ingredient = new Ingredient();

            $existingIngredient = $ingredient->getIngredientByName($name);
            if($existingIngredient){
                $_SESSION['message'] = "Ingredient already exists";
                $_SESSION['message-type'] = "error";
                header("Location:" . BASE_URL . "/store/ingredients");
                exit();

            }

            $result = $ingredient->create($name, $category, $uom, $minimumStock, $status, $description, $currentStock);


            if ($result) {
                $_SESSION['message'] = "Ingredient Created successfully";
                $_SESSION['message-type'] = "success";

            } else {
                $_SESSION['message'] = "Ingredient creation failed";
                $_SESSION['message-type'] = "error";
            }

            header("Location:" . BASE_URL . "/store/ingredients");
            exit();
        }

        // If accessed without valid POST data, redirect back
        header("Location:" . BASE_URL . "/store/ingredients");
        exit();
    }

    public function editIngredient(array $param = [])
    {
        if (isset($_POST['id']) && isset($_POST['name'])) {

            $id = (int) $_POST['id'];
            $name = trim($_POST['name']);
            $category = $_POST['category'] ?? '';
            $uom = $_POST['uom'] ?? '';
            $minimumStock = (float) ($_POST['min_stock'] ?? 0);
            $status = $_POST['status'] ?? 'Active';
            $description = trim($_POST['description'] ?? '');
            $currentStock = (float) ($_POST['current_stock'] ?? 0);

            require_once __DIR__ . '/../models/ingredient.php';
            $ingredient = new Ingredient();
            $existingIngredient = $ingredient->getIngredientByNameExceptId($name,$id);
            if($existingIngredient){
                $_SESSION['message'] = "Ingredient already exists";
                $_SESSION['message-type'] = "error";
                header("Location:" . BASE_URL . "/store/ingredients");
                exit();
            }
            $result = $ingredient->updateIngredient($id, $name, $category, $uom, $minimumStock, $status, $description, $currentStock);

            if ($result) {
                $_SESSION['message'] = "Ingredient updated successfully";
                $_SESSION['message-type'] = "success";
            } else {
                $_SESSION['message'] = "Ingredient update failed";
                $_SESSION['message-type'] = "error";
            }

            header("Location:" . BASE_URL . "/store/ingredients");
            exit();
        }

        // If accessed without valid POST data, just redirect
        header("Location:" . BASE_URL . "/store/ingredients");
        exit();
    }

    public function deleteIngredient(array $param = [])
    {
        if (isset($_POST['id'])) {
            $id = (int) $_POST['id'];

            $ingredient = new Ingredient();

            $result = $ingredient->deleteIngredient($id);

            if ($result) {
                $_SESSION['message'] = "Ingredient deleted successfully";
                $_SESSION['message-type'] = "success";
            } else {
                $_SESSION['message'] = "Ingredient deletion failed";
                $_SESSION['message-type'] = "error";
            }

            header("Location:" . BASE_URL . "/store/ingredients");
            exit();
        }
        // If accessed without valid POST data, just redirect
       header("Location:" . BASE_URL . "/store/ingredients");
       exit();
   }

   public function getBySku(array $param = [])
   {
       if (isset($param['sku'])) {
           header('Content-Type: application/json');
           echo json_encode((new Ingredient())->getBySku($param['sku']));
           exit();
       }
   }
}
