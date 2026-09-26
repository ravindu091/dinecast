<?php

require_once __DIR__ . '/../Core/Database.php';

class User
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = (new Database())->getConnection();
    }

    public function all(): array
    {
        $query = $this->connection->query(
            'SELECT id, full_name, username, email, role, is_active, last_login
             FROM users
             ORDER BY id DESC'
        );

        return $query->fetchAll();
    }

    public function create(
        string $fullName,
        string $username,
        ?string $email,
        string $role,
        string $passwordHash
    ): void {
        $query = $this->connection->prepare(
            'INSERT INTO users
             (full_name, username, email, role, password_hash)
             VALUES
             (:full_name, :username, :email, :role, :password_hash)'
        );

        $query->execute([
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
        $query = $this->connection->prepare(
            'UPDATE users
             SET full_name = :full_name,
                 username = :username,
                 email = :email,
                 role = :role
             WHERE id = :id'
        );

        $query->execute([
            'id' => $id,
            'full_name' => $fullName,
            'username' => $username,
            'email' => $email,
            'role' => $role
        ]);
    }

    public function delete(int $id): void
    {
        $query = $this->connection->prepare(
            'DELETE FROM users WHERE id = :id'
        );

        $query->execute([
            'id' => $id
        ]);
    }
}