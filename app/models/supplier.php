<?php

require_once __DIR__ . "/../Core/Database.php";

class Supplier{
    private PDO $conn;

    public function __construct()
    {
        $database = new Database();

        $this->conn = $database->getConnection();
    }

    public function create(
        string $name,
        string $category,
        ?string $contactPerson,
        string $phone,
        ?string $email,
        ?string $address
    ):bool{
        $stmt = $this->conn->prepare('INSERT INTO suppliers(name,category,contact_person,phone,email,address)
         VALUES(:name,:category,:contact_person,:phone,:email,:address)');

        return $stmt->execute([
            ':name' => $name,
            ':category' => $category,
            ':contact_person' => $contactPerson,
            ':phone' => $phone,
            ':email' => $email,
            ':address' => $address
        ]);
    }

    public function getAllSuppliers(){
        $stmt = $this->conn->prepare("SELECT * FROM suppliers ORDER BY name ASC");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    //suppliers that purchase orders can be sent to
    public function countActiveSuppliers():int{
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM suppliers WHERE status = 'Active'");

        $stmt->execute();

        return (int) $stmt->fetchColumn();
    }

    //true when another supplier already uses this name
    //$excludeId skips the supplier being edited, so it can keep its own name
    public function nameExists(string $name, int $excludeId = 0):bool{
        $stmt = $this->conn->prepare('SELECT COUNT(*) FROM suppliers WHERE name = :name AND id <> :id');

        $stmt->execute([
            ':name' => $name,
            ':id' => $excludeId
        ]);

        return $stmt->fetchColumn() > 0;
    }

    public function updateSupplier(
        int $id,
        string $name,
        string $category,
        ?string $contactPerson,
        string $phone,
        ?string $email,
        ?string $address
    ):bool{
        $stmt = $this->conn->prepare("UPDATE suppliers SET
        name = :name,
        category = :category,
        contact_person = :contact_person,
        phone = :phone,
        email = :email,
        address = :address
         WHERE id = :id");

        return $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':category' => $category,
            ':contact_person' => $contactPerson,
            ':phone' => $phone,
            ':email' => $email,
            ':address' => $address
        ]);
    }

    //returns the number of rows removed, so 0 means the supplier was not found
    public function deleteSupplier(int $id):int{
        $stmt = $this->conn->prepare('DELETE FROM suppliers WHERE id = :id');

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->rowCount();
    }
}
