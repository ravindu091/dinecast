<?php

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

    public function ingredient(array $params = []){
        $this->renderWithLayout('store/ingredients', 'store/layout',[
            'title'=>'Ingredient planning',
            'activePage'=>'ingredient',
        ]);
    }

    public function inventory(array $params = []){
        $this->renderWithLayout('store/inventory', 'store/layout',[
            'title'=>'Inventory planning',
            'activePage'=>'inventory',
        ]);
    }

    public function po(array $params = []){
        $this->renderWithLayout('store/po', 'store/layout',[
            'title'=>'Purchase Orders',
            'activePage'=>'po',
        ]);
    }

    public function stock(array $param = []){
        $this->renderWithLayout('store/stock','store/layout',[
            'title'=>'Receive Stock',
            'activePage'=>'stock',
        ]);    
        
    }


}
