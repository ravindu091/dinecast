<?php

require_once __DIR__ . '/../models/Recipe.php';
require_once __DIR__ . '/../models/ingredient.php';

class ChefController extends Controller {

    private const RECIPE_UOMS = ['g', 'kg', 'ml', 'L', 'pcs'];

    public function __construct() {
        parent::__construct();
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

        $editMenuItemIds = array_column($recipes, 'menu_item_id');

        $this->renderWithLayout('chef/recipes', 'chef/layout', [
            'title' => 'Chef - Recipes',
            'activePage' => 'recipes',
            'recipes' => $recipes,
            'missingRecipes' => $recipe->getMissingRecipes(),
            'ingredients' => $ingredient->getAllIngredients(),
            'menuItems' => $recipe->getMenuItems(),
            'editMenuItems' => $recipe->getMenuItemsForEdit($editMenuItemIds),
        ]);
    }

    public function createRecipe(array $params = []): void {
        $this->requireValidCsrfToken();
        $menuItemId = (int) ($_POST['menu_item_id'] ?? 0);
        $validation = $this->recipeLinesFromPost();
        $errors = $validation['errors'];

        if ($menuItemId < 1) {
            $errors[] = 'Select a valid menu item.';
        }

        if ($errors !== []) {
            $this->flashAndRedirect(implode(' ', $errors), 'error');
        }

        $lines = $validation['lines'];
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
        $validation = $this->recipeLinesFromPost();
        $errors = $validation['errors'];

        if ($id < 1) {
            $errors[] = 'Invalid recipe ID.';
        }

        if ($menuItemId < 1) {
            $errors[] = 'Select a valid menu item.';
        }

        if ($errors !== []) {
            $this->flashAndRedirect(implode(' ', $errors), 'error');
        }

        $lines = $validation['lines'];
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

        $allowedUoms = self::RECIPE_UOMS;
        $errors = [];

        if (
            !is_array($ingredientIds) ||
            !is_array($quantities) ||
            !is_array($uoms) ||
            !is_array($wastages)
        ) {
            return [
                'lines' => [],
                'errors' => ['Invalid ingredient data.'],
            ];
        }

        if (count($ingredientIds) === 0) {
            $errors[] = 'Add at least one ingredient.';
        }

        $lines = [];

        foreach ($ingredientIds as $index => $ingredientId) {
            $ingredientId = filter_var($ingredientId, FILTER_VALIDATE_INT);
            $quantity = filter_var(
                $quantities[$index] ?? null,
                FILTER_VALIDATE_FLOAT
            );
            $uom = trim($uoms[$index] ?? '');
            $wastage = filter_var(
                $wastages[$index] ?? 0,
                FILTER_VALIDATE_FLOAT
            );

            $lineErrors = [];

            if (!$ingredientId || $ingredientId < 1) {
                $lineErrors[] = 'Invalid ingredient.';
            }

            if ($quantity === false || $quantity <= 0) {
                $lineErrors[] = 'Quantity must be greater than zero.';
            }

            if (!in_array($uom, $allowedUoms, true)) {
                $lineErrors[] = 'Invalid unit of measure.';
            }

            if ($wastage === false || $wastage < 0 || $wastage > 100) {
                $lineErrors[] = 'Wastage must be between 0 and 100.';
            }

            if ($lineErrors !== []) {
                $errors = array_merge($errors, $lineErrors);
                continue;
            }

            $lines[] = [
                'ingredient_id' => $ingredientId,
                'quantity_per_guest' => $quantity,
                'uom' => $uom,
                'wastage_percent' => $wastage,
            ];
        }

        return [
            'lines' => $lines,
            'errors' => array_values(array_unique($errors)),
        ];
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
