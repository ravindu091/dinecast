<?php
class KitchenController extends Controller {
    public function dashboard(array $params = []): void {
        $this->render('kitchen');
    }
}
