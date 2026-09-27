<?php

class CeoController extends Controller {

    /**
     * GET /ceo — CEO / Super Admin dashboard
     */

    public function __construct() {
        if (!isset($_SESSION['userId'])) {
            header('Location: ' . BASE_URL . '/');
            exit;
        }

        if (($_SESSION['role'] ?? '') !== 'ceo') {
            http_response_code(403);
            exit('Forbidden');
        }
    }
    
    public function dashboard(array $params = []): void {
        $this->render('ceo');
    }
}
