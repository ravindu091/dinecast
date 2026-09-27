<?php
require_once __DIR__ . "/../models/ingredient.php";
require_once __DIR__ . "/../lib/store/utility.php";
class StoreController extends Controller
{

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['userId']) || $_SESSION['role'] != 'store'){
            header("Location:" . BASE_URL . "/");
            exit();
        }
    }

    public function home(array $params = [])
    {
        $this->renderWithLayout('store/home', 'store/layout', [
            'title' => 'Store Manager - Dashboard',
            'activePage' => 'home',
        ]);
    }

    public function ingredients(array $params = [])
    {

        $ingredient = new Ingredient();
        $items = $ingredient->getAllIngredients();
        $ingredientCount = count($items);
        $lowStockCount = $ingredient->getNearMinimumStockCount($items);

        $this->renderWithLayout('store/ingredients', 'store/layout', [
            'title' => 'Ingredient planning',
            'activePage' => 'ingredient',
            'ingredients' => $items,
            'ingredientCount' => $ingredientCount,
            'lowStockCount' => $lowStockCount
        ]);
    }

    public function inventory(array $params = [])
    {
        $this->renderWithLayout('store/inventory', 'store/layout', [
            'title' => 'Inventory planning',
            'activePage' => 'inventory',
        ]);
    }

    public function issue(array $params = [])
    {
        $this->renderWithLayout('store/issue', 'store/layout', [
            'title' => 'Issue Stocks',
            'activePage' => 'issue',
        ]);
    }

    public function stock(array $param = [])
    {
        $this->renderWithLayout('store/stock', 'store/layout', [
            'title' => 'Receive Stock',
            'activePage' => 'stock',
        ]);

    }

    public function pr(array $param = [])
    {
        $this->renderWithLayout('store/pr', 'store/layout', [
            'title' => 'Purchase Requisitions',
            'activePage' => 'pr',
        ]);
    }

    public function createIngredient(array $param = [])
    {
        //get data
        if (isset($_POST['name']) && trim($_POST['name']) !== '') {

            $name = trim($_POST['name']);
            $category = $_POST['category'] ?? '';
            $uom = $_POST['uom'] ?? '';
            $minimumStock = (float) ($_POST['min_stock'] ?? 0);
            $status = $_POST['status'] ?? 'active';
            $description = trim($_POST['description'] ?? '');
            $currentStock = (float) ($_POST['current_stock'] ?? 0);

            require_once __DIR__ . '/../models/ingredient.php';

            $ingredient = new Ingredient();

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
            $status = $_POST['status'] ?? 'active';
            $description = trim($_POST['description'] ?? '');
            $currentStock = (float) ($_POST['current_stock'] ?? 0);

            require_once __DIR__ . '/../models/ingredient.php';
            $ingredient = new Ingredient();

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
}
