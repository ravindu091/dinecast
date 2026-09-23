<?php

class ChefController extends Controller {

    /**
     * GET /chef — Chef / Kitchen Manager dashboard
     */
    
    public function home(array $params = []){
        $this->renderWithLayout('chef/home','chef/layout',[
            'title' => 'Chef - Dashboard',
            'activePage' => 'home',
        ]);
    }
    
    public function menus(array $params =[]){
        $this->renderWithLayout('chef/menus','chef/layout',[
            'title' => 'Chef- Dashboard',
            'activePage' => 'menus'
        ]);
    }

    public function recipes(array $params =[]){
        $this->renderWithLayout('chef/recipes','chef/layout',[
            'title' => 'Chef - Dashboard',
            'activePage' => 'recipes'
        ]);
    }
}
