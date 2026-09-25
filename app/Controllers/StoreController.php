<?php
require_once __DIR__."/../models/ingredient.php";
require_once __DIR__."/../lib/store/utility.php";
class StoreController extends Controller {

    /**
     * GET /store — Store Manager dashboard
     */
    

    public function home(array $params = []){
        $this->renderWithLayout('store/home','store/layout',[
            'title' => 'Store Manager - Dashboard',
            'activePage' => 'home',
        ]);
    }

    public function ingredients(array $params = []){

        $ingredient = new Ingredient();
        $items = $ingredient->getAllIngredients();
        $ingredientCount = count($items);
        $lowStockCount = $ingredient->getNearMinimumStockCount($items);

        $this->renderWithLayout('store/ingredients', 'store/layout',[
            'title'=>'Ingredient planning',
            'activePage'=>'ingredient',
            'ingredients'=>$items,
            'ingredientCount'=>$ingredientCount,
            'lowStockCount'=>$lowStockCount
        ]);
    }

    public function inventory(array $params = []){
        $this->renderWithLayout('store/inventory', 'store/layout',[
            'title'=>'Inventory planning',
            'activePage'=>'inventory',
        ]);
    }

    public function issue(array $params = []){
        $this->renderWithLayout('store/issue', 'store/layout',[
            'title'=>'Issue Stocks',
            'activePage'=>'issue',
        ]);
    }

    public function stock(array $param = []){
        $this->renderWithLayout('store/stock','store/layout',[
            'title'=>'Receive Stock',
            'activePage'=>'stock',
        ]);    
        
    }

    public function createIngredient(array $param = []){
        //get data
        if(isset($_POST['name'])){

            $name = $_POST['name'];
            $category = $_POST['category'];
            $uom = $_POST['uom'];
            $minimumStock = $_POST['min_stock'];
            $status = $_POST['status'];
            $description = $_POST['description'];
            $currentStock = $_POST['current_stock'];


            require_once __DIR__.'/../models/ingredient.php';

            $ingredient = new Ingredient();

            $result = $ingredient->create($name,$category,$uom,$minimumStock,$status,$description,$currentStock);


            if($result){
                $_SESSION['message'] = "Ingredient Created successfully";
                $_SESSION['message-type'] = "success";

            }else{
                $_SESSION['message'] = "Ingredient creation failed";
                $_SESSION['message-type'] = "error";
            }

            header("Location:".BASE_URL."/store/ingredients");
            exit();
        }

        //validate


        //store


        //redirect
    }


}
