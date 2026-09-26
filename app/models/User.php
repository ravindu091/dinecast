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
}