<?php
class ProcurementController extends Controller {
    public function dashboard(array $params = []): void {
        $this->render('procurement');
    }
}
