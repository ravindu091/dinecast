<?php
class KitchenController extends Controller {
    public function dashboard(array $params = []): void {
        $this->render('kitchen');
    }

    public function home(array $params = []){
        $this->renderWithLayout('kitchen/home','kitchen/layout',[
            'title' => 'Kitchen Manager - Dashboard',
            'activePage' => 'home',
        ]);
    }
    public function events(array $params = []){
        $this->renderWithLayout('kitchen/events','kitchen/layout',[
            'title' => 'Kitchen Manager - Dashboard',
            'activePage' => 'events',
        ]);
    }
    public function bookings(array $params = []){
        $this->renderWithLayout('kitchen/bookings','kitchen/layout',[
            'title' => 'Kitchen Manager - Dashboard',
            'activePage' => 'bookings',
        ]);
    }
    public function forecast(array $params = []){
        $this->renderWithLayout('kitchen/forecast','kitchen/layout',[
            'title' => 'Kitchen Manager - Dashboard',
            'activePage' => 'forecast',
        ]);
    }
    public function pr(array $params = []){
        $this->renderWithLayout('kitchen/pr','kitchen/layout',[
            'title' => 'Kitchen Manager - Dashboard',
            'activePage' => 'pr',
        ]);
    }
    public function attendance(array $params = []){
        $this->renderWithLayout('kitchen/attendance','kitchen/layout',[
            'title' => 'Kitchen Manager - Dashboard',
            'activePage' => 'attendance',
        ]);
    }
}
