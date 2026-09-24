<?php

class CeoController extends Controller {

    /**
     * GET /ceo — CEO Overview dashboard
     */
    public function home(array $params = []): void {
        $this->renderWithLayout('ceo/home', 'ceo/layout', [
            'title'      => 'CEO - Overview',
            'activePage' => 'home',
        ]);
    }

    /**
     * GET /ceo/events — All events
     */
    public function events(array $params = []): void {
        $this->renderWithLayout('ceo/events', 'ceo/layout', [
            'title'      => 'CEO - Events',
            'activePage' => 'events',
        ]);
    }

    /**
     * GET /ceo/procurement — Procurement overview
     */
    public function procurement(array $params = []): void {
        $this->renderWithLayout('ceo/procurement', 'ceo/layout', [
            'title'      => 'CEO - Procurement',
            'activePage' => 'procurement',
        ]);
    }

    /**
     * GET /ceo/inventory — Inventory overview (CEO view)
     */
    public function inventory(array $params = []): void {
        $this->renderWithLayout('ceo/inventory', 'ceo/layout', [
            'title'      => 'CEO - Inventory',
            'activePage' => 'inventory',
        ]);
    }

    /**
     * GET /ceo/approvals — PR Approvals
     */
    public function approvals(array $params = []): void {
        $this->renderWithLayout('ceo/approvals', 'ceo/layout', [
            'title'      => 'CEO - PR Approvals',
            'activePage' => 'approvals',
        ]);
    }

    /**
     * GET /ceo/users — System users management
     */
    public function users(array $params = []): void {
        $this->renderWithLayout('ceo/users', 'ceo/layout', [
            'title'      => 'CEO - Users',
            'activePage' => 'users',
        ]);
    }

    /**
     * GET /ceo/reports — Reports & Analytics
     */
    public function reports(array $params = []): void {
        $this->renderWithLayout('ceo/reports', 'ceo/layout', [
            'title'      => 'CEO - Reports & Analytics',
            'activePage' => 'reports',
        ]);
    }
}
