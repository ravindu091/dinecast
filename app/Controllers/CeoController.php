<?php

class CeoController extends Controller {

    /**
     * GET /ceo — CEO / Super Admin dashboard
     */
    public function dashboard(array $params = []): void {
        $this->render('ceo');
    }
}
