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

    public function getItemsByMenuIds(array $menuIds): array {
        $menuIds = array_values(array_unique(array_filter(array_map('intval', $menuIds), static fn (int $id): bool => $id > 0)));
        if ($menuIds === []) {
            return [];
        }

        $placeholders = implode(',', array_fill(0, count($menuIds), '?'));
        $stmt = $this->conn->prepare(
            "SELECT id, menu_id, name FROM menu_items WHERE menu_id IN ($placeholders) ORDER BY name"
        );
        $stmt->execute($menuIds);

        $itemsByMenu = [];
        foreach ($stmt->fetchAll() as $item) {
            $itemsByMenu[(int) $item['menu_id']][] = $item;
        }

        return $itemsByMenu;
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

    public function updateMenu(int $id, string $name, string $type, string $status, ?string $description, array $newItems = []): bool {
        try {
            $this->conn->beginTransaction();

            $stmt = $this->conn->prepare(
                'UPDATE menus SET name = :name, type = :type, status = :status, description = :description
                 WHERE id = :id'
            );
            $stmt->execute([
                ':id' => $id,
                ':name' => $name,
                ':type' => $type,
                ':status' => $status,
                ':description' => $description,
            ]);

            if ($newItems !== []) {
                $itemStmt = $this->conn->prepare(
                    'INSERT INTO menu_items (menu_id, name) VALUES (:menu_id, :name)'
                );
                foreach ($newItems as $itemName) {
                    $itemStmt->execute([':menu_id' => $id, ':name' => $itemName]);
                }
            }

            $this->conn->commit();
            return true;
        } catch (Throwable $exception) {
            if ($this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            throw $exception;
        }
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
