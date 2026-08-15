<?php

class StoreController extends Controller {

    /**
     * GET /store — Store Manager dashboard
     */
    public function dashboard(array $params = []): void {
        $this->render('store');
    }
}
