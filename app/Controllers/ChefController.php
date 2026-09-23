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
    
    public function menu(array $params =[]){
        $this->renderWithLayout('chef/home','chef/layout',[
            'title' => 'Chef- Dashboard',
            'activePage' => 'menu'
        ]);
    }

    public function recipe(array $params =[]){
        $this->renderWithLayout('chef/recipe','chef/layout',[
            'title' => 'Chef - Dashboard',
            'activePage' => 'recipe'
        ]);
    }
}
