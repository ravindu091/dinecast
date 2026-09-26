<?php
class AdminController extends Controller {
    public function __construct(){
        if(!isset($_SESSION['userId']) || !isset($_SESSION['role'])){
            header('Location:'.BASE_URL .'/');
            exit;
        }
        if($_SESSION['role'] !== 'admin'){
            header('Location:'.BASE_URL .'/');
            exit;
        }
    }
    public function home(array $params = []): void {
        $this->renderWithLayout('admin/home', 'admin/layout', [
            'title' => 'Admin Dashboard',
            'pageTitle' => 'System Administration Panel',
            'activePage' => 'home'
        ]);
    }

    public function users(array $params = []): void {
        require_once __DIR__ . '/../Core/Database.php';

        $database = new Database();
        $connection = $database->getConnection();

        $query = $connection->query(
            'SELECT id, full_name, username, email, role, is_active, last_login
             FROM users
             ORDER BY id DESC'
        );

        $users = $query->fetchAll();

        $this->renderWithLayout('admin/users', 'admin/layout', [
            'title' => 'User Management',
            'pageTitle' => 'User Management Panel',
            'activePage' => 'users',
            'users' => $users
        ]);
    }

    public function params(array $params = []): void {
        $this->renderWithLayout('admin/params', 'admin/layout', [
            'title' => 'System Parameters',
            'pageTitle' => 'System Parameters Config',
            'activePage' => 'params'
        ]);
    }

    public function uom(array $params = []): void {
        $this->renderWithLayout('admin/uom', 'admin/layout', [
            'title' => 'Units of Measure',
            'pageTitle' => 'Units of Measure Config',
            'activePage' => 'uom'
        ]);
    }

    public function holidays(array $params = []): void {
        $this->renderWithLayout('admin/holidays', 'admin/layout', [
            'title' => 'Holiday Calendar',
            'pageTitle' => 'Holiday Calendar Config',
            'activePage' => 'holidays'
        ]);
    }

    public function logs(array $params = []): void {
        $this->renderWithLayout('admin/logs', 'admin/layout', [
            'title' => 'Activity Logs',
            'pageTitle' => 'System Activity Logs',
            'activePage' => 'logs'
        ]);
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

        header('Location: ' . BASE_URL . '/admin/users');
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
    
        header('Location: ' . BASE_URL . '/admin/users');
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

        header('Location: ' . BASE_URL . '/admin/users');
        exit;
    }
}