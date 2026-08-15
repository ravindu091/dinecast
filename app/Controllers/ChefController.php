<?php

class ChefController extends Controller {

    /**
     * GET /chef — Chef / Kitchen Manager dashboard
     */
    public function dashboard(array $params = []): void {
        $this->render('chef');
    }
}
