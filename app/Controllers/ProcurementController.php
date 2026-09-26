<?php
class ProcurementController extends Controller {

    /**
     * GET /procurement — Procurement Manager dashboard
     */
    public function home(array $params = []) {
        $this->renderWithLayout('procurement/home', 'procurement/layout', [
            'title' => 'Procurement Manager Dashboard',
            'activePage' => 'home',
        ]);
    }

    public function suppliers(array $params = []) {
        $this->renderWithLayout('procurement/suppliers', 'procurement/layout', [
            'title' => 'Suppliers',
            'activePage' => 'suppliers',
        ]);
    }

    public function requisitions(array $params = []) {
        $this->renderWithLayout('procurement/requisitions', 'procurement/layout', [
            'title' => 'Requisitions',
            'activePage' => 'requisitions',
        ]);
    }

    public function orders(array $params = []) {
        $this->renderWithLayout('procurement/orders', 'procurement/layout', [
            'title' => 'Orders',
            'activePage' => 'orders',
        ]);
    }
}
