<?php


class ProfileController extends Controller {
    
    public function profile() {
        // Fallback to 'store' if session role is not set
        $role = $_SESSION['role'] ?? 'store';
        $userId = $_SESSION['userId'];
        
        $this->renderWithLayout('profile', $role . '/layout', [
            'title' => 'My Profile',
            'pageTitle' => 'My Profile',
            'activePage' => 'profile',
            'userId' => $userId
        ]);
    }
}