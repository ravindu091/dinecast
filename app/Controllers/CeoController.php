<?php

class CeoController extends Controller {

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['userId']) || $_SESSION['role'] != 'ceo'){
            header("Location:" . (defined('BASE_URL') ? BASE_URL : '/dinecast') . "/");
            exit();
        }
    }

    /**
     * GET /ceo — CEO / Super Admin dashboard
     */
    public function dashboard(array $params = []): void {
        $this->render('ceo');
    }
}
