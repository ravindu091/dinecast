<?php
class AdminController extends Controller {
    public function dashboard(array $params = []): void {
        $this->render('admin');
    }
}
