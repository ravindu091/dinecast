<?php
class AdminController extends Controller {
    public function dashboard(array $params = []): void {
        require_once __DIR__ . '/../Core/Database.php';

        $database = new Database();
        $connection = $database->getConnection();

        $query = $connection->query(
            'SELECT id, full_name, username, email, role, is_active, last_login
             FROM users
             ORDER BY id DESC'
        );

        $users = $query->fetchAll();

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

        require_once __DIR__ . '/../Core/Database.php';

        $connection = (new Database())->getConnection();

        $query = $connection->prepare(
            'INSERT INTO users
            (full_name, username, email, role, password_hash)
            VALUES
            (:full_name, :username, :email, :role, :password_hash)'
        );

        $query->execute([
            'full_name' => $fullName,
            'username' => $username,
            'email' => $email !== '' ? $email : null,
            'role' => $role,
            'password_hash' => $passwordHash
        ]);

        header('Location: ' . BASE_URL . '/admin');
        exit;
    }

    public function deleteUser(array $params = []): void
    {
        $id = (int) ($_POST['id'] ?? 0);
    
        if ($id <= 0) {
            exit('Invalid user ID.');
        }
    
        require_once __DIR__ . '/../Core/Database.php';
    
        $connection = (new Database())->getConnection();
    
        $query = $connection->prepare(
            'DELETE FROM users WHERE id = :id'
        );
    
        $query->execute([
            'id' => $id
        ]);
    
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

        require_once __DIR__ . '/../Core/Database.php';

        $connection = (new Database())->getConnection();
        $query = $connection->prepare(
            'UPDATE users
             SET full_name = :full_name,
                 username = :username,
                 email = :email,
                 role = :role
             WHERE id = :id'
        );

        $query->execute([
            'full_name' => $fullName,
            'username' => $username,
            'email' => $email !== '' ? $email : null,
            'role' => $role,
            'id' => $id
        ]);

        header('Location: ' . BASE_URL . '/admin');
        exit;
    }
}