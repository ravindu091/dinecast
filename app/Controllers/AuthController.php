<?php

class AuthController extends Controller {

    /**
     * GET /  — Show the login page
     */
    public function login(array $params = []): void {
        $this->render('login');
    }
}
