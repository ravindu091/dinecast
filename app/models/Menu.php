<?php

require_once __DIR__ . '/../Core/Database.php';

class Menu {
    private PDO $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    //every menu, with how many dishes it has and how many of those dishes have a recipe
    public function getAllMenus(): array {
        $stmt = $this->conn->query(
            'SELECT m.id, m.name, m.type, m.status, m.description,
                    COUNT(DISTINCT mi.id) AS item_count,
                    COUNT(DISTINCT r.menu_item_id) AS recipe_count
             FROM menus m
             LEFT JOIN menu_items mi ON mi.menu_id = m.id
             LEFT JOIN recipes r ON r.menu_item_id = mi.id
             GROUP BY m.id
             ORDER BY m.name'
        );

        return $stmt->fetchAll();
    }

    //one menu, or false when no menu has this id
    public function getMenuById(int $id) {
        $stmt = $this->conn->prepare('SELECT * FROM menus WHERE id = :id');
        $stmt->execute([':id' => $id]);

        return $stmt->fetch();
    }

    //true when another menu already uses this name
    //$excludeId skips the menu being edited, so it can keep its own name
    public function nameExists(string $name, int $excludeId = 0): bool {
        $stmt = $this->conn->prepare('SELECT COUNT(*) FROM menus WHERE name = :name AND id <> :id');
        $stmt->execute([':name' => $name, ':id' => $excludeId]);

        return $stmt->fetchColumn() > 0;
    }

    public function create(string $name, string $type, string $status, ?string $description): bool {
        $stmt = $this->conn->prepare(
            'INSERT INTO menus (name, type, status, description)
             VALUES (:name, :type, :status, :description)'
        );

        return $stmt->execute([
            ':name' => $name,
            ':type' => $type,
            ':status' => $status,
            ':description' => $description,
        ]);
    }

    public function updateMenu(int $id, string $name, string $type, string $status, ?string $description): bool {
        $stmt = $this->conn->prepare(
            'UPDATE menus SET name = :name, type = :type, status = :status, description = :description
             WHERE id = :id'
        );

        return $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':type' => $type,
            ':status' => $status,
            ':description' => $description,
        ]);
    }

    //deleting a menu would also delete its dishes and their recipes (ON DELETE CASCADE),
    //so a menu is only removed while it has no dishes; the check and the delete are one statement
    //returns the number of rows removed, so 0 means not found or still has dishes
    public function deleteMenuIfEmpty(int $id): int {
        $stmt = $this->conn->prepare(
            'DELETE FROM menus
             WHERE id = :id
               AND NOT EXISTS (SELECT 1 FROM menu_items WHERE menu_id = :menu_id)'
        );
        $stmt->execute([':id' => $id, ':menu_id' => $id]);

        return $stmt->rowCount();
    }
}
