<?php

require_once __DIR__ . '/../models/Recipe.php';
require_once __DIR__ . '/../models/Ingredient.php';
require_once __DIR__ . '/../models/Menu.php';

class ChefController extends Controller {

    private const RECIPE_UOMS = ['g', 'kg', 'ml', 'L', 'pcs'];

    //the only menu types and statuses allowed (same lists as the form)
    private const MENU_TYPES = ['Wedding', 'Corporate', 'Festive', 'Seminar', 'Birthday', 'Cocktail', 'Other'];
    private const MENU_STATUSES = ['Active', 'Inactive'];
    private const MENU_DESCRIPTION_MAX = 1000;

    //MySQL error number for a duplicate value in a UNIQUE column
    private const DUPLICATE_ENTRY = 1062;

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
    
    public function menus(array $params = []) {
        $menu = new Menu();

        //values the user typed before the server rejected the form, so the dialog can reopen with them
        $retry = $_SESSION['menu_form_retry'] ?? null;
        unset($_SESSION['menu_form_retry']);

        $this->renderWithLayout('chef/menus', 'chef/layout', [
            'title' => 'Chef - Menus',
            'activePage' => 'menus',
            'menus' => $menu->getAllMenus(),
            'menuTypes' => self::MENU_TYPES,
            'menuStatuses' => self::MENU_STATUSES,
            'retry' => $retry,
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

    public function stock(): void {
        $this->renderWithLayout('chef/stock', 'chef/layout', [
            'title' => 'Chef - Request Ingredients',
            'activePage' => 'stock'
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

    /**
     * POST /chef/menus/create
     */
    public function createMenu(array $params = []): void {
        $this->requireValidMenuCsrfToken();

        [$data, $error] = $this->readMenuForm();
        $retry = ['mode' => 'add', 'values' => $data];

        $menu = new Menu();

        if ($error === null && $menu->nameExists($data['name'])) {
            $error = 'A menu with this name already exists';
        }

        if ($error !== null) {
            $this->backToMenus($error, 'error', $retry);
        }

        try {
            $menu->create($data['name'], $data['type'], $data['status'], $data['description']);
        } catch (PDOException $e) {
            $this->backToMenus($this->menuSaveErrorMessage($e, 'created'), 'error', $retry);
        }

        $this->backToMenus('Menu created successfully', 'success');
    }

    /**
     * POST /chef/menus/update/:id
     */
    public function updateMenu(array $params = []): void {
        $this->requireValidMenuCsrfToken();

        $menu = new Menu();

        //the menu may have been deleted meanwhile, e.g. in another tab
        $id = $this->routeId($params);
        if ($id === 0 || !$menu->getMenuById($id)) {
            $this->backToMenus('Menu not found. It may have been deleted.', 'error');
        }

        [$data, $error] = $this->readMenuForm();
        $retry = ['mode' => 'edit', 'values' => $data + ['id' => $id]];

        if ($error === null && $menu->nameExists($data['name'], $id)) {
            $error = 'A menu with this name already exists';
        }

        if ($error !== null) {
            $this->backToMenus($error, 'error', $retry);
        }

        try {
            $menu->updateMenu($id, $data['name'], $data['type'], $data['status'], $data['description']);
        } catch (PDOException $e) {
            $this->backToMenus($this->menuSaveErrorMessage($e, 'updated'), 'error', $retry);
        }

        $this->backToMenus('Menu updated successfully', 'success');
    }

    /**
     * POST /chef/menus/delete/:id
     */
    public function deleteMenu(array $params = []): void {
        $this->requireValidMenuCsrfToken();

        $menu = new Menu();

        $id = $this->routeId($params);
        if ($id === 0 || !$menu->getMenuById($id)) {
            $this->backToMenus('Menu not found. It may have already been deleted.', 'error');
        }

        //refused while the menu has dishes, because deleting it would also delete their recipes
        if ($menu->deleteMenuIfEmpty($id) === 0) {
            $this->backToMenus('This menu has dishes with recipes linked to it, so it cannot be deleted. Set it to Inactive instead.', 'error');
        }

        $this->backToMenus('Menu deleted successfully', 'success');
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

    /**
     * Reads the Add/Edit menu form and checks it.
     * The browser checks the same rules, but the server is the real guard:
     * a request can be sent without using the form at all.
     * Returns [cleaned data, error message or null].
     */
    private function readMenuForm(): array {
        $data = [
            'name' => $this->postText('name'),
            'type' => $this->postText('type'),
            'status' => $this->postText('status'),
            'description' => $this->postText('description'),
        ];

        $error = null;
        if ($data['name'] === '') {
            $error = 'Menu name is required';
        } else if (mb_strlen($data['name']) > 150) {
            $error = 'Menu name must be 150 characters or fewer';
        } else if (!in_array($data['type'], self::MENU_TYPES, true)) {
            $error = 'Please choose a valid menu type';
        } else if (!in_array($data['status'], self::MENU_STATUSES, true)) {
            $error = 'Please choose a valid status';
        } else if (mb_strlen($data['description']) > self::MENU_DESCRIPTION_MAX) {
            $error = 'Description must be ' . self::MENU_DESCRIPTION_MAX . ' characters or fewer';
        }

        //an empty description is stored as NULL, not as empty text
        if ($data['description'] === '') {
            $data['description'] = null;
        }

        return [$data, $error];
    }

    //a form field as trimmed text; anything that is not plain text (e.g. name[]=x) counts as empty
    private function postText(string $field): string {
        $value = $_POST[$field] ?? '';
        return is_string($value) ? trim($value) : '';
    }

    //the menu id from the URL, or 0 when it is not a whole number
    private function routeId(array $params): int {
        $id = $params['id'] ?? '';
        return (is_string($id) && ctype_digit($id)) ? (int) $id : 0;
    }

    //every change must come from a form this site produced (blocks cross-site request forgery)
    private function requireValidMenuCsrfToken(): void {
        $token = $_POST['csrf_token'] ?? null;
        if (!verifyCsrfToken(is_string($token) ? $token : null)) {
            $this->backToMenus('Your session has expired. Please try again.', 'error');
        }
    }

    //turns a database error into a message the user can act on
    private function menuSaveErrorMessage(PDOException $e, string $action): string {
        if (($e->errorInfo[1] ?? null) === self::DUPLICATE_ENTRY) {
            return 'A menu with this name already exists';
        }
        return 'Menu could not be ' . $action . '. Please try again.';
    }

    private function backToMenus(string $message, string $type, ?array $retry = null): void {
        $_SESSION['message'] = $message;
        $_SESSION['message-type'] = $type;
        if ($retry !== null) {
            $_SESSION['menu_form_retry'] = $retry;
        }

        header('Location: ' . BASE_URL . '/chef/menus');
        exit();
    }
}
