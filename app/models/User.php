<?php
require_once __DIR__ .'/../Core/Database.php';
class User{
    private PDO $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getUserByUsername(string $username){

        $stmt = $this->conn->prepare('SELECT * FROM users WHERE username = :username ');
        $stmt->execute([
            ":username" => $username
        ]);

        return $stmt->fetch();
    }

    public function getUserById(int $userId){
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE id = :userId ');
        $stmt->execute([
            ":userId" => $userId
        ]);

        return $stmt->fetch();
    }

    public function updateProfilePicture(
        int $userId,
        string $profilePicture
    ): bool {
        $stmt = $this->conn->prepare(
            "UPDATE users
             SET profile_picture = :profile_picture
             WHERE id = :id"
        );
    
        return $stmt->execute([
            ':profile_picture' => $profilePicture,
            ':id' => $userId
        ]);
    }

    public function updateUser(int $userId, string $fullName, string $email): bool {
        $stmt = $this->conn->prepare(
            "UPDATE users
             SET full_name = :full_name, email = :email
             WHERE id = :id"
        );
    
        return $stmt->execute([
            ':full_name' => $fullName,
            ':email' => $email,
            ':id' => $userId
        ]);
    }

    public function updatePassword(int $userId, string $hashedPassword): bool {
        $stmt = $this->conn->prepare(
            "UPDATE users
             SET password_hash = :password
             WHERE id = :id"
        );
    
        return $stmt->execute([
            ':password' => $hashedPassword,
            ':id' => $userId
        ]);
    }

    public function all(): array
    {
        $stmt = $this->conn->query(
            'SELECT id, full_name, username, email, role, is_active, last_login
             FROM users
             ORDER BY id DESC'
        );

        return $stmt->fetchAll();
    }

    public function create(
        string $fullName,
        string $username,
        ?string $email,
        string $role,
        string $passwordHash
    ): void {
        $stmt = $this->conn->prepare(
            'INSERT INTO users
             (full_name, username, email, role, password_hash)
             VALUES
             (:full_name, :username, :email, :role, :password_hash)'
        );

        $stmt->execute([
            'full_name' => $fullName,
            'username' => $username,
            'email' => $email,
            'role' => $role,
            'password_hash' => $passwordHash
        ]);
    }

    public function update(
        int $id,
        string $fullName,
        string $username,
        ?string $email,
        string $role
    ): void {
        $stmt = $this->conn->prepare(
            'UPDATE users
             SET full_name = :full_name,
                 username = :username,
                 email = :email,
                 role = :role
             WHERE id = :id'
        );

        $stmt->execute([
            'id' => $id,
            'full_name' => $fullName,
            'username' => $username,
            'email' => $email,
            'role' => $role
        ]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->conn->prepare(
            'DELETE FROM users WHERE id = :id'
        );

        $stmt->execute(['id' => $id]);
    }
}