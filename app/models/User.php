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
}