<?php

require_once __DIR__ . '/../Models/User.php';

class AdminController extends Controller {
    public function dashboard(array $params = []): void {
        $users = (new User())->all();

        $this->render('admin', [ 'users' => $users ]);
    }

    public function createUser(array $params = []): void
    {
        $fullName = trim($_POST['full_name'] ?? '');
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $role = $_POST['role'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($fullName === '' || $username === '' || $role === '') {
            exit('Required fields are missing.');
        }

        if (strlen($password) < 8) {
            exit('Password must be at least 8 characters.');
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        (new User())->create(
            $fullName,
            $username,
            $email !== '' ? $email : null,
            $role,
            $passwordHash
        );

        header('Location: ' . BASE_URL . '/admin');
        exit;
    }

    public function deleteUser(array $params = []): void
    {
        $id = (int) ($_POST['id'] ?? 0);
    
        if ($id <= 0) {
            exit('Invalid user ID.');
        }
    
        (new User())->delete($id);
    
        header('Location: ' . BASE_URL . '/admin');
        exit;
    }

    public function updateUser(array $params = []): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        $fullName = trim($_POST['full_name'] ?? '');
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $role = $_POST['role'] ?? '';

        if ($id <= 0 || $fullName === '' || $username === '' || $role === '') {
            exit('Invalid user data.');
        }

        (new User())->update(
            $id,
            $fullName,
            $username,
            $email !== '' ? $email : null,
            $role
        );

        header('Location: ' . BASE_URL . '/admin');
        exit;
    }
}