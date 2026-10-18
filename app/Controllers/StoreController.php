<?php
require_once __DIR__ . "/../models/Ingredient.php";
require_once __DIR__ . "/../Models/Category.php";
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
    // ______ view render here ________ 
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
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();


        $this->renderWithLayout('store/ingredients', 'store/layout', [
            'title' => 'Ingredient planning',
            'activePage' => 'ingredient',
            'ingredients' => $items,
            'ingredientCount' => $ingredientCount,
            'lowStockCount' => $lowStockCount,
            'categories'=> $categories
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

    
}
