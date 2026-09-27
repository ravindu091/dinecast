<?php

require_once __DIR__ . '/../Core/Database.php';

class Recipe {
    private PDO $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll(): array {
        $stmt = $this->conn->query(
                'SELECT r.id, r.menu_item_id, mi.name AS menu_item_name, m.name AS menu_name,
                    COUNT(ri.id) AS ingredient_count
             FROM recipes r
             INNER JOIN menu_items mi ON mi.id = r.menu_item_id
             INNER JOIN menus m ON m.id = mi.menu_id
             LEFT JOIN recipe_ingredients ri ON ri.recipe_id = r.id
             GROUP BY r.id, r.menu_item_id, mi.name, m.name
             ORDER BY m.name, mi.name'
        );

        return $stmt->fetchAll();
    }

    public function getLinesForRecipeIds(array $recipeIds): array {
        $recipeIds = array_values(array_unique(array_filter(array_map('intval', $recipeIds))));
        if ($recipeIds === []) {
            return [];
        }

        $placeholders = implode(',', array_fill(0, count($recipeIds), '?'));
        $stmt = $this->conn->prepare(
            "SELECT ri.recipe_id, ri.id, ri.ingredient_id, i.name AS ingredient_name,
                    ri.quantity_per_guest, ri.uom, ri.wastage_percent
             FROM recipe_ingredients ri
             INNER JOIN ingredients i ON i.id = ri.ingredient_id
             WHERE ri.recipe_id IN ($placeholders)
             ORDER BY ri.recipe_id, ri.id"
        );
        $stmt->execute($recipeIds);

        $linesByRecipe = [];
        foreach ($stmt->fetchAll() as $line) {
            $linesByRecipe[(int) $line['recipe_id']][] = $line;
        }

        return $linesByRecipe;
    }

    public function getById(int $id): ?array {
        $recipeStmt = $this->conn->prepare(
            'SELECT r.id, r.menu_item_id, mi.name AS menu_item_name, m.name AS menu_name
             FROM recipes r
             INNER JOIN menu_items mi ON mi.id = r.menu_item_id
             INNER JOIN menus m ON m.id = mi.menu_id
             WHERE r.id = :id'
        );
        $recipeStmt->execute([':id' => $id]);
        $recipe = $recipeStmt->fetch();

        if (!$recipe) {
            return null;
        }

        $lineStmt = $this->conn->prepare(
            'SELECT ri.id, ri.ingredient_id, i.name AS ingredient_name,
                    ri.quantity_per_guest, ri.uom, ri.wastage_percent
             FROM recipe_ingredients ri
             INNER JOIN ingredients i ON i.id = ri.ingredient_id
             WHERE ri.recipe_id = :recipe_id
             ORDER BY ri.id'
        );
        $lineStmt->execute([':recipe_id' => $id]);
        $recipe['lines'] = $lineStmt->fetchAll();

        return $recipe;
    }

    public function getMenuItems(): array {
        $stmt = $this->conn->query(
            "SELECT mi.id, mi.name, m.name AS menu_name
             FROM menu_items mi
             INNER JOIN menus m ON m.id = mi.menu_id
             WHERE m.status = 'Active'
             ORDER BY m.name, mi.name"
        );

        return $stmt->fetchAll();
    }

    /**
     * Return active menu items plus any items already assigned to recipes.
     * This keeps creation restricted to active menus while allowing existing
     * recipes to be edited after their menu becomes inactive.
     */
    public function getMenuItemsForEdit(array $recipeMenuItemIds): array {
        $recipeMenuItemIds = array_values(array_unique(array_filter(
            array_map('intval', $recipeMenuItemIds),
            static fn (int $id): bool => $id > 0
        )));

        if ($recipeMenuItemIds === []) {
            return $this->getMenuItems();
        }

        $placeholders = implode(',', array_fill(0, count($recipeMenuItemIds), '?'));
        $stmt = $this->conn->prepare(
            "SELECT mi.id, mi.name, m.name AS menu_name
             FROM menu_items mi
             INNER JOIN menus m ON m.id = mi.menu_id
             WHERE m.status = 'Active' OR mi.id IN ($placeholders)
             ORDER BY m.name, mi.name"
        );
        $stmt->execute($recipeMenuItemIds);

        return $stmt->fetchAll();
    }

    public function create(int $menuItemId, array $lines): bool {
        try {
            $this->conn->beginTransaction();

            $recipeStmt = $this->conn->prepare(
                'INSERT INTO recipes (menu_item_id) VALUES (:menu_item_id)'
            );
            $recipeStmt->execute([':menu_item_id' => $menuItemId]);

            $this->insertLines((int) $this->conn->lastInsertId(), $lines);
            $this->conn->commit();
            return true;
        } catch (Throwable $exception) {
            if ($this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            return false;
        }
    }

    public function update(int $id, int $menuItemId, array $lines): bool {
        try {
            $this->conn->beginTransaction();

            $recipeStmt = $this->conn->prepare(
                'UPDATE recipes SET menu_item_id = :menu_item_id WHERE id = :id'
            );
            $recipeStmt->execute([
                ':id' => $id,
                ':menu_item_id' => $menuItemId,
            ]);

            $deleteLines = $this->conn->prepare(
                'DELETE FROM recipe_ingredients WHERE recipe_id = :recipe_id'
            );
            $deleteLines->execute([':recipe_id' => $id]);
            $this->insertLines($id, $lines);

            $this->conn->commit();
            return true;
        } catch (Throwable $exception) {
            if ($this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            return false;
        }
    }

    public function delete(int $id): bool {
        $stmt = $this->conn->prepare('DELETE FROM recipes WHERE id = :id');
        $stmt->execute([':id' => $id]);

        return $stmt->rowCount() === 1;
    }

    public function getMissingRecipes(): array {
        $stmt = $this->conn->query(
            "SELECT mi.id, mi.name AS menu_item_name, m.name AS menu_name
             FROM menu_items mi
             INNER JOIN menus m ON m.id = mi.menu_id
             LEFT JOIN recipes r ON r.menu_item_id = mi.id
             WHERE r.id IS NULL AND m.status = 'Active'
             ORDER BY m.name, mi.name"
        );

        return $stmt->fetchAll();
    }

    private function insertLines(int $recipeId, array $lines): void {
        $stmt = $this->conn->prepare(
            'INSERT INTO recipe_ingredients
                (recipe_id, ingredient_id, quantity_per_guest, uom, wastage_percent)
             VALUES
                (:recipe_id, :ingredient_id, :quantity_per_guest, :uom, :wastage_percent)'
        );

        foreach ($lines as $line) {
            $stmt->execute([
                ':recipe_id' => $recipeId,
                ':ingredient_id' => $line['ingredient_id'],
                ':quantity_per_guest' => $line['quantity_per_guest'],
                ':uom' => $line['uom'],
                ':wastage_percent' => $line['wastage_percent'],
            ]);
        }
    }
}
