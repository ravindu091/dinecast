<?php
require_once __DIR__ . "/../models/supplier.php";

class ProcurementController extends Controller {

    //the only categories a supplier can belong to (same list as the form)
    private const SUPPLIER_CATEGORIES = ['Meat & Seafood', 'Dairy & Staples', 'Vegetables', 'Dry Goods', 'Specialty'];

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

        $this->renderWithLayout('procurement/suppliers', 'procurement/layout', [
            'title' => 'Suppliers',
            'activePage' => 'suppliers',
            'suppliers' => $supplier->getAllSuppliers(),
            'categories' => self::SUPPLIER_CATEGORIES,
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
        [$data, $error] = $this->readSupplierForm();

        $supplier = new Supplier();

        if ($error === null && $supplier->nameExists($data['name'])) {
            $error = "A supplier with this name already exists";
        }

        if ($error !== null) {
            $this->backToSuppliers($error, "error");
        }

        $result = $supplier->create($data['name'], $data['category'], $data['contact_person'], $data['phone'], $data['email'], $data['address']);

        if ($result) {
            $this->backToSuppliers("Supplier added successfully", "success");
        }
        $this->backToSuppliers("Supplier could not be added", "error");
    }

    /**
     * POST /supplier/edit
     */
    public function editSupplier(array $params = []) {
        $id = (int) ($_POST['id'] ?? 0);
        if ($id <= 0) {
            $this->backToSuppliers("Supplier not found", "error");
        }

        [$data, $error] = $this->readSupplierForm();

        $supplier = new Supplier();

        if ($error === null && $supplier->nameExists($data['name'], $id)) {
            $error = "A supplier with this name already exists";
        }

        if ($error !== null) {
            $this->backToSuppliers($error, "error");
        }

        $result = $supplier->updateSupplier($id, $data['name'], $data['category'], $data['contact_person'], $data['phone'], $data['email'], $data['address']);

        if ($result) {
            $this->backToSuppliers("Supplier updated successfully", "success");
        }
        $this->backToSuppliers("Supplier could not be updated", "error");
    }

    /**
     * POST /supplier/delete
     */
    public function deleteSupplier(array $params = []) {
        $id = (int) ($_POST['id'] ?? 0);

        $supplier = new Supplier();

        if ($id > 0 && $supplier->deleteSupplier($id) > 0) {
            $this->backToSuppliers("Supplier deleted successfully", "success");
        }
        $this->backToSuppliers("Supplier not found", "error");
    }

    /**
     * Reads the Add/Edit supplier form and checks it.
     * The browser checks the same rules, but the server is the real guard:
     * a request can be sent without using the form at all.
     * Returns [cleaned data, error message or null].
     */
    private function readSupplierForm(): array {
        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'category' => trim($_POST['category'] ?? ''),
            'contact_person' => trim($_POST['contact_person'] ?? ''),
            'phone' => trim($_POST['phone'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'address' => trim($_POST['address'] ?? ''),
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

    private function backToSuppliers(string $message, string $type): void {
        $_SESSION['message'] = $message;
        $_SESSION['message-type'] = $type;

        header("Location:" . BASE_URL . "/procurement/suppliers");
        exit();
    }
}
