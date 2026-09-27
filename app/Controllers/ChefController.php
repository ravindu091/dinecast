<?php

require_once __DIR__ . '/../models/Recipe.php';
require_once __DIR__ . '/../models/ingredient.php';

class ChefController extends Controller {

    private const RECIPE_UOMS = ['g', 'kg', 'ml', 'L', 'pcs'];

    public function __construct() {
        $this->requireChef();
    }

    private function requireChef(): void {
        $baseUrl = defined('BASE_URL') ? BASE_URL : '/dinecast';

        if (!isset($_SESSION['userId'])) {
            header('Location: ' . $baseUrl . '/');
            exit;
        }

        if (($_SESSION['role'] ?? '') !== 'chef') {
            http_response_code(403);
            exit('Forbidden');
        }
    }

    /**
     * GET /chef — Chef / Kitchen Manager dashboard
     */
    
    public function home(array $params = []){
        $this->renderWithLayout('chef/home','chef/layout',[
            'title' => 'Chef - Dashboard',
            'activePage' => 'home',
        ]);
    }
    
    public function menus(array $params =[]){
        $this->renderWithLayout('chef/menus','chef/layout',[
            'title' => 'Chef- Dashboard',
            'activePage' => 'menus'
        ]);
    }

    public function recipes(array $params = []): void {
        $recipe = new Recipe();
        $ingredient = new Ingredient();
        $recipes = $recipe->getAll();
        $linesByRecipe = $recipe->getLinesForRecipeIds(array_column($recipes, 'id'));

        foreach ($recipes as &$recipeRow) {
            $recipeRow['lines'] = $linesByRecipe[(int) $recipeRow['id']] ?? [];
        }
        unset($recipeRow);

        $this->renderWithLayout('chef/recipes', 'chef/layout', [
            'title' => 'Chef - Recipes',
            'activePage' => 'recipes',
            'recipes' => $recipes,
            'missingRecipes' => $recipe->getMissingRecipes(),
            'ingredients' => $ingredient->getAllIngredients(),
            'menuItems' => $recipe->getMenuItems(),
        ]);
    }

    public function createRecipe(array $params = []): void {
        $this->requireValidCsrfToken();
        $menuItemId = (int) ($_POST['menu_item_id'] ?? 0);
        $lines = $this->recipeLinesFromPost();

        if ($menuItemId < 1 || $lines === []) {
            $this->flashAndRedirect('A menu item and at least one valid ingredient are required.', 'error');
        }

        $recipe = new Recipe();
        $saved = $recipe->create($menuItemId, $lines);
        $this->flashAndRedirect(
            $saved ? 'Recipe created successfully.' : 'Recipe could not be created.',
            $saved ? 'success' : 'error'
        );
    }

    public function updateRecipe(array $params = []): void {
        $this->requireValidCsrfToken();
        $id = (int) ($params['id'] ?? 0);
        $menuItemId = (int) ($_POST['menu_item_id'] ?? 0);
        $lines = $this->recipeLinesFromPost();

        if ($id < 1 || $menuItemId < 1 || $lines === []) {
            $this->flashAndRedirect('Invalid recipe data.', 'error');
        }

        $recipe = new Recipe();
        $saved = $recipe->update($id, $menuItemId, $lines);
        $this->flashAndRedirect(
            $saved ? 'Recipe updated successfully.' : 'Recipe could not be updated.',
            $saved ? 'success' : 'error'
        );
    }

    public function deleteRecipe(array $params = []): void {
        $this->requireValidCsrfToken();
        $id = (int) ($params['id'] ?? 0);
        $deleted = $id > 0 && (new Recipe())->delete($id);

        $this->flashAndRedirect(
            $deleted ? 'Recipe deleted successfully.' : 'Recipe could not be deleted.',
            $deleted ? 'success' : 'error'
        );
    }

    private function recipeLinesFromPost(): array {
        $ingredientIds = $_POST['ingredient_id'] ?? [];
        $quantities = $_POST['quantity_per_guest'] ?? [];
        $uoms = $_POST['uom'] ?? [];
        $wastages = $_POST['wastage_percent'] ?? [];
        $lines = [];

        if (!is_array($ingredientIds) || !is_array($quantities) || !is_array($uoms)) {
            return [];
        }

        foreach ($ingredientIds as $index => $ingredientId) {
            $ingredientId = (int) $ingredientId;
            $quantity = (float) ($quantities[$index] ?? 0);
            $uom = trim((string) ($uoms[$index] ?? ''));
            $wastage = (float) ($wastages[$index] ?? 0);

            if (
                $ingredientId < 1
                || $quantity <= 0
                || !in_array($uom, self::RECIPE_UOMS, true)
                || $wastage < 0
                || $wastage > 100
            ) {
                continue;
            }

            $lines[] = [
                'ingredient_id' => $ingredientId,
                'quantity_per_guest' => $quantity,
                'uom' => $uom,
                'wastage_percent' => $wastage,
            ];
        }

        return $lines;
    }

    private function flashAndRedirect(string $message, string $type): void {
        $_SESSION['message'] = $message;
        $_SESSION['message-type'] = $type;
        header('Location: ' . BASE_URL . '/chef/recipes');
        exit();
    }

    private function requireValidCsrfToken(): void {
        if (!verifyCsrfToken($_POST['csrf_token'] ?? null)) {
            $this->flashAndRedirect('Your session token is invalid. Please try again.', 'error');
        }
    }
}
