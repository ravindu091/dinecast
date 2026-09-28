<?php
require_once __DIR__ . "/../models/supplier.php";

class ProcurementController extends Controller {

    //the only categories a supplier can belong to (same list as the form)
    private const SUPPLIER_CATEGORIES = ['Meat & Seafood', 'Dairy & Staples', 'Vegetables', 'Dry Goods', 'Specialty'];

    //MySQL error number for a duplicate value in a UNIQUE column
    private const DUPLICATE_ENTRY = 1062;

    //runs before every procurement page and action:
    //only a signed-in procurement manager gets past this
    public function __construct(){
        if(!isset($_SESSION['userId']) || $_SESSION['role'] != 'procurement'){
            header("Location:" . BASE_URL . "/");
            exit();
        }
    }

    /**
     * GET /procurement — Procurement Manager dashboard
     */
    public function home(array $params = []) {
        $supplier = new Supplier();

        $this->renderWithLayout('procurement/home', 'procurement/layout', [
            'title' => 'Procurement Manager Dashboard',
            'activePage' => 'home',
            'activeSupplierCount' => $supplier->countActiveSuppliers(),
        ]);
    }

    public function suppliers(array $params = []) {
        $supplier = new Supplier();

        //values the user typed before the server rejected the form, so the dialog can reopen with them
        $retry = $_SESSION['supplier_form_retry'] ?? null;
        unset($_SESSION['supplier_form_retry']);

        $this->renderWithLayout('procurement/suppliers', 'procurement/layout', [
            'title' => 'Suppliers',
            'activePage' => 'suppliers',
            'suppliers' => $supplier->getAllSuppliers(),
            'categories' => self::SUPPLIER_CATEGORIES,
            'retry' => $retry,
        ]);
    }

    public function requisitions(array $params = []) {
        $this->renderWithLayout('procurement/requisitions', 'procurement/layout', [
            'title' => 'Requisitions',
            'activePage' => 'requisitions',
        ]);
    }

    public function orders(array $params = []) {
        $this->renderWithLayout('procurement/orders', 'procurement/layout', [
            'title' => 'Orders',
            'activePage' => 'orders',
        ]);
    }

    /**
     * POST /supplier/create
     */
    public function createSupplier(array $params = []) {
        $this->requireValidCsrfToken();

        [$data, $error] = $this->readSupplierForm();
        $retry = ['mode' => 'add', 'values' => $data];

        $supplier = new Supplier();

        if ($error === null && $supplier->nameExists($data['name'])) {
            $error = "A supplier with this name already exists";
        }

        if ($error !== null) {
            $this->backToSuppliers($error, "error", $retry);
        }

        try {
            $supplier->create($data['name'], $data['category'], $data['contact_person'], $data['phone'], $data['email'], $data['address']);
        } catch (PDOException $e) {
            $this->backToSuppliers($this->saveErrorMessage($e, "added"), "error", $retry);
        }

        $this->backToSuppliers("Supplier added successfully", "success");
    }

    /**
     * POST /supplier/edit
     */
    public function editSupplier(array $params = []) {
        $this->requireValidCsrfToken();

        $supplier = new Supplier();

        //the supplier may have been deleted meanwhile, e.g. in another tab
        $id = $this->postId();
        if ($id === 0 || !$supplier->getSupplierById($id)) {
            $this->backToSuppliers("Supplier not found. It may have been deleted.", "error");
        }

        [$data, $error] = $this->readSupplierForm();
        $retry = ['mode' => 'edit', 'values' => $data + ['id' => $id]];

        if ($error === null && $supplier->nameExists($data['name'], $id)) {
            $error = "A supplier with this name already exists";
        }

        if ($error !== null) {
            $this->backToSuppliers($error, "error", $retry);
        }

        try {
            $supplier->updateSupplier($id, $data['name'], $data['category'], $data['contact_person'], $data['phone'], $data['email'], $data['address']);
        } catch (PDOException $e) {
            $this->backToSuppliers($this->saveErrorMessage($e, "updated"), "error", $retry);
        }

        $this->backToSuppliers("Supplier updated successfully", "success");
    }

    /**
     * POST /supplier/delete
     */
    public function deleteSupplier(array $params = []) {
        $this->requireValidCsrfToken();

        $id = $this->postId();

        $supplier = new Supplier();

        if ($id > 0 && $supplier->deleteSupplier($id) > 0) {
            $this->backToSuppliers("Supplier deleted successfully", "success");
        }
        $this->backToSuppliers("Supplier not found. It may have already been deleted.", "error");
    }

    /**
     * Reads the Add/Edit supplier form and checks it.
     * The browser checks the same rules, but the server is the real guard:
     * a request can be sent without using the form at all.
     * Returns [cleaned data, error message or null].
     */
    private function readSupplierForm(): array {
        $data = [
            'name' => $this->postText('name'),
            'category' => $this->postText('category'),
            'contact_person' => $this->postText('contact_person'),
            'phone' => $this->postText('phone'),
            'email' => $this->postText('email'),
            'address' => $this->postText('address'),
        ];

        $error = null;
        if ($data['name'] === '') {
            $error = "Supplier name is required";
        } else if (mb_strlen($data['name']) > 100) {
            $error = "Supplier name must be 100 characters or fewer";
        } else if (!in_array($data['category'], self::SUPPLIER_CATEGORIES, true)) {
            $error = "Please choose a valid category";
        } else if (!preg_match('/^0(?:[ -]?\d){9}$/', $data['phone'])) {
            //Sri Lankan number: 10 digits starting with 0, dashes or spaces allowed
            $error = "Phone must be a 10-digit number starting with 0, e.g. 077-1234567";
        } else if ($data['email'] !== '' && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error = "Please enter a valid email address";
        } else if (mb_strlen($data['contact_person']) > 100 || mb_strlen($data['email']) > 150 || mb_strlen($data['address']) > 255) {
            $error = "One of the fields is too long";
        }

        //optional fields left blank are stored as NULL, not as empty text
        foreach (['contact_person', 'email', 'address'] as $field) {
            if ($data[$field] === '') {
                $data[$field] = null;
            }
        }

        return [$data, $error];
    }

    //a form field as trimmed text; anything that is not plain text (e.g. name[]=x) counts as empty
    private function postText(string $field): string {
        $value = $_POST[$field] ?? '';
        return is_string($value) ? trim($value) : '';
    }

    //the posted supplier id, or 0 when it is missing or not a whole number
    //(casting a list to int gives 1, which would silently target supplier 1)
    private function postId(): int {
        $id = $_POST['id'] ?? '';
        return (is_string($id) && ctype_digit($id)) ? (int) $id : 0;
    }

    //every change must come from a form this site produced (blocks cross-site request forgery)
    private function requireValidCsrfToken(): void {
        $token = $_POST['csrf_token'] ?? null;
        if (!verifyCsrfToken(is_string($token) ? $token : null)) {
            $this->backToSuppliers("Your session has expired. Please try again.", "error");
        }
    }

    //turns a database error into a message the user can act on
    private function saveErrorMessage(PDOException $e, string $action): string {
        if (($e->errorInfo[1] ?? null) === self::DUPLICATE_ENTRY) {
            return "A supplier with this name already exists";
        }
        return "Supplier could not be " . $action . ". Please try again.";
    }

    private function backToSuppliers(string $message, string $type, ?array $retry = null): void {
        $_SESSION['message'] = $message;
        $_SESSION['message-type'] = $type;
        if ($retry !== null) {
            $_SESSION['supplier_form_retry'] = $retry;
        }

        header("Location:" . BASE_URL . "/procurement/suppliers");
        exit();
    }
}
