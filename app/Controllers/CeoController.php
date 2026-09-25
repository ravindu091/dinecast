<?php
/**
 * CEO Controller
 * Handles all CEO / Top Management views.
 *
 * Routes (see app/config/routes.php):
 *   GET /ceo                    → home()
 *   GET /ceo/events             → events()
 *   GET /ceo/procurement        → procurement()
 *   GET /ceo/inventory          → inventory()
 *   GET /ceo/approvals          → approvals()
 *   GET /ceo/users              → users()
 *   GET /ceo/reports            → reports()
 *   GET /ceo/exportReport/:key  → exportReport()
 *
 * Requirements covered:
 *   - FR4  : Role-based access control (CEO only)
 *   - FR28 : Forecast vs Actual variance report
 *   - FR29 : Executive dashboard
 *
 * CEO = READ-ONLY. No approve/reject/raise/manage actions.
 */

require_once __DIR__ . '/../core/Controller.php';

class CeoController extends Controller
{
    /* -------------------------------------------------
       Lazy-loaded models
       ------------------------------------------------- */
    private $eventModel;
    private $prModel;
    private $poModel;
    private $inventoryModel;
    private $varianceModel;
    private $forecastModel;
    private $userModel;

    /* -------------------------------------------------
       Constructor – RBAC check (FR4)
       ------------------------------------------------- */
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Allow only CEO role
        $role = $_SESSION['role'] ?? null;
        if ($role !== 'ceo' && $role !== 'CEO') {
            header('Location: ' . (defined('BASE_URL') ? BASE_URL : '/dinecast') . '/login');
            exit;
        }
    }

    /* -------------------------------------------------
       Helper: safely load a model if its file exists
       ------------------------------------------------- */
    private function model(string $name)
    {
        $file = __DIR__ . '/../Models/' . $name . '.php';
        if (!file_exists($file)) {
            return null; // model not yet created — controller stays safe
        }
        require_once $file;

        // Try common class-name conventions
        foreach ([$name, $name . 'Model'] as $class) {
            if (class_exists($class)) {
                return new $class();
            }
        }
        return null;
    }

    /* -------------------------------------------------
       Helper: render with CEO layout + common data
       ------------------------------------------------- */
    private function renderCeo(string $view, array $data = []): void
    {
        $common = [
            'userName'  => $_SESSION['user_name']  ?? 'Amara Perera',
            'userRole'  => $_SESSION['role_label'] ?? 'CEO / Top Management',
            'userCode'  => $_SESSION['user_code']  ?? 'DC-CEO-01',
            'activePage'=> '',
        ];

        $this->renderWithLayout(
            'ceo/' . $view,
            'ceo/layout',
            array_merge($common, $data)
        );
    }

    /* =================================================
       GET /ceo — Executive Overview (FR29)
       ================================================= */
    public function home(array $params = []): void
    {
        $this->eventModel     = $this->model('Event');
        $this->prModel        = $this->model('PurchaseRequisition');
        $this->inventoryModel = $this->model('Inventory');
        $this->forecastModel  = $this->model('Forecast');
        $this->varianceModel  = $this->model('ForecastVariance');

        // ---- KPIs ----
        $kpis = [
            'events_this_month'  => $this->eventModel    ? $this->eventModel->countByMonth(date('Y-m'))      : 0,
            'events_delta'       => $this->eventModel    ? $this->eventModel->deltaFromLastMonth()           : 0,
            'total_guests'       => $this->eventModel    ? $this->eventModel->sumGuestsByMonth(date('Y-m'))  : 0,
            'guests_delta_pct'   => $this->eventModel    ? $this->eventModel->guestsDeltaPct()              : 0,
            'forecast_accuracy'  => $this->forecastModel ? $this->forecastModel->getAccuracyPct()           : 0,
            'accuracy_delta_pct' => $this->forecastModel ? $this->forecastModel->accuracyDelta()            : 0,
            'procurement_spend'  => $this->prModel       ? $this->prModel->sumEstimatedCost(['approved','issued','received']) : 0,
            'spend_delta_pct'    => $this->prModel       ? $this->prModel->spendDeltaPct()                  : 0,
            'low_stock_items'    => $this->inventoryModel? $this->inventoryModel->countBelowMin()           : 0,
        ];

        // ---- Chart data ----
        $forecastChart = $this->eventModel ? $this->eventModel->getLast8EventsForChart() : [];
        $procurement   = $this->prModel    ? $this->prModel->getSpendByCategory(date('Y-m')) : [];

        // ---- Lists ----
        $upcomingEvents = $this->eventModel ? $this->eventModel->getUpcomingEvents(30, 5) : [];
        $variance       = $this->varianceModel ? $this->varianceModel->getRecentVariances(6) : [];

        // ---- Inventory summary ----
        $inventory = [
            'normal'      => $this->inventoryModel ? $this->inventoryModel->countNormal()          : 0,
            'below_min'   => $this->inventoryModel ? $this->inventoryModel->countBelowMin()        : 0,
            'near_expiry' => $this->inventoryModel ? $this->inventoryModel->countNearExpiry(7)     : 0,
            'expired'     => $this->inventoryModel ? $this->inventoryModel->countExpired()         : 0,
            'trend'       => $this->inventoryModel ? $this->inventoryModel->getMonthlyTrend(8)     : [],
        ];

        // ---- Alerts (static for now, extend later) ----
        $alerts = [];

        $this->renderCeo('home', [
            'title'          => 'CEO - Overview',
            'activePage'     => 'home',
            'kpis'           => $kpis,
            'forecastChart'  => $forecastChart,
            'procurement'    => $procurement,
            'upcomingEvents' => $upcomingEvents,
            'inventory'      => $inventory,
            'variance'       => $variance,
            'alerts'         => $alerts,
            'monthLabel'     => date('F Y'),
            'monthShort'     => date('M'),
        ]);
    }

    /* =================================================
       GET /ceo/events — All events
       ================================================= */
    public function events(array $params = []): void
    {
        $this->eventModel = $this->model('Event');

        $month  = $_GET['month'] ?? date('Y-m');
        $events = $this->eventModel ? $this->eventModel->getEventsByMonth($month) : [];

        $stats = [
            'total'        => $this->eventModel ? $this->eventModel->countByMonth($month)                      : 0,
            'confirmed'    => $this->eventModel ? $this->eventModel->countByMonthAndStatus($month,'confirmed') : 0,
            'tentative'    => $this->eventModel ? $this->eventModel->countByMonthAndStatus($month,'tentative') : 0,
            'total_guests' => $this->eventModel ? $this->eventModel->sumGuestsByMonth($month)                  : 0,
        ];

        $this->renderCeo('events', [
            'title'      => 'CEO - Events',
            'activePage' => 'events',
            'events'     => $events,
            'stats'      => $stats,
            'monthLabel' => date('F Y', strtotime($month . '-01')),
        ]);
    }

    /* =================================================
       GET /ceo/procurement — Procurement overview
       ================================================= */
    public function procurement(array $params = []): void
    {
        $this->prModel = $this->model('PurchaseRequisition');
        $this->poModel = $this->model('PurchaseOrder');

        $stats = [
            'pending_prs'  => $this->prModel ? $this->prModel->countByStatus('pending')                          : 0,
            'approved_prs' => $this->prModel ? $this->prModel->countByStatus('approved')                         : 0,
            'open_pos'     => $this->poModel ? $this->poModel->countOpen()                                       : 0,
            'total_spend'  => $this->prModel ? $this->prModel->sumEstimatedCost(['approved','issued','received']): 0,
        ];

        $recentPRs      = $this->prModel ? $this->prModel->getRecentWithDetails(10)           : [];
        $purchaseOrders = $this->poModel ? $this->poModel->getRecent(10)                      : [];
        $supplierSpend  = $this->prModel ? $this->prModel->getSpendBySupplier(date('Y-m'), 5) : [];

        $this->renderCeo('procurement', [
            'title'          => 'CEO - Procurement',
            'activePage'     => 'procurement',
            'stats'          => $stats,
            'recentPRs'      => $recentPRs,
            'purchaseOrders' => $purchaseOrders,
            'supplierSpend'  => $supplierSpend,
            'monthLabel'     => date('F Y'),
            'monthShort'     => date('M'),
        ]);
    }

    /* =================================================
       GET /ceo/inventory — Inventory overview
       ================================================= */
    public function inventory(array $params = []): void
    {
        $this->inventoryModel = $this->model('Inventory');

        $stats = [
            'total_lines' => $this->inventoryModel ? $this->inventoryModel->countAllIngredients() : 0,
            'below_min'   => $this->inventoryModel ? $this->inventoryModel->countBelowMin()       : 0,
            'near_expiry' => $this->inventoryModel ? $this->inventoryModel->countNearExpiry(7)    : 0,
            'expired'     => $this->inventoryModel ? $this->inventoryModel->countExpired()        : 0,
        ];

        $criticalItems = $this->inventoryModel
            ? $this->inventoryModel->getBelowMinItems()
            : [];

        $this->renderCeo('inventory', [
            'title'         => 'CEO - Inventory',
            'activePage'    => 'inventory',
            'stats'         => $stats,
            'criticalItems' => $criticalItems,
        ]);
    }

    /* =================================================
       GET /ceo/approvals — PR Approvals (view-only)
       ================================================= */
    public function approvals(array $params = []): void
    {
        $this->prModel = $this->model('PurchaseRequisition');

        $prs = $this->prModel ? $this->prModel->getAllPRsWithDetails() : [];

        $stats = [
            'pending'     => $this->prModel ? $this->prModel->countByStatus('pending')                 : 0,
            'approved'    => $this->prModel ? $this->prModel->countByStatusThisMonth('approved')       : 0,
            'rejected'    => $this->prModel ? $this->prModel->countByStatusThisMonth('rejected')       : 0,
            'total_value' => $this->prModel ? $this->prModel->sumEstimatedCost(['pending','approved']) : 0,
        ];

        $this->renderCeo('approvals', [
            'title'      => 'CEO - PR Approvals',
            'activePage' => 'approvals',
            'prs'        => $prs,
            'stats'      => $stats,
        ]);
    }

    /* =================================================
       GET /ceo/users — Team Directory (view-only)
       ================================================= */
    public function users(array $params = []): void
    {
        $this->userModel = $this->model('User');

        $stats = [
            'active_users' => $this->userModel ? $this->userModel->countActive()    : 0,
            'online_users' => $this->userModel ? $this->userModel->countOnline(15)  : 0,
        ];

        $users = $this->userModel ? $this->userModel->getAllForDirectory() : [];

        $this->renderCeo('users', [
            'title'      => 'CEO - Team Directory',
            'activePage' => 'users',
            'stats'      => $stats,
            'users'      => $users,
        ]);
    }

    /* =================================================
       GET /ceo/reports — Reports & Analytics
       ================================================= */
    public function reports(array $params = []): void
    {
        $this->eventModel     = $this->model('Event');
        $this->prModel        = $this->model('PurchaseRequisition');
        $this->forecastModel  = $this->model('Forecast');
        $this->inventoryModel = $this->model('Inventory');

        // ---- Reports catalogue (static config) ----
        $reports = [
            (object)['title'=>'Forecast Accuracy Report',  'description'=>'Actual vs. Forecast comparison across all events','badge_class'=>'bg-green', 'export_key'=>'forecast-accuracy'],
            (object)['title'=>'Procurement Spend Report',  'description'=>'Monthly spend by supplier and category',           'badge_class'=>'bg-blue',  'export_key'=>'procurement-spend'],
            (object)['title'=>'Inventory Variance Report', 'description'=>'Used vs. received quantities per batch',            'badge_class'=>'bg-purple','export_key'=>'inventory-variance'],
            (object)['title'=>'Event Summary Report',      'description'=>'Guests, menus, and PR data per event',               'badge_class'=>'bg-orange','export_key'=>'event-summary'],
            (object)['title'=>'Low Stock Alert Report',    'description'=>'Items below minimum stock threshold',                'badge_class'=>'bg-red',   'export_key'=>'low-stock'],
        ];

        // ---- Month-to-date metrics ----
        $metrics = [
            'total_events'      => $this->eventModel     ? $this->eventModel->countByMonth(date('Y-m'))              : 0,
            'guests_served'     => $this->eventModel     ? $this->eventModel->sumConfirmedGuestsByMonth(date('Y-m')) : 0,
            'forecast_accuracy' => $this->forecastModel  ? $this->forecastModel->getMtdAccuracyPct()                 : 0,
            'recorded_events'   => $this->forecastModel  ? $this->forecastModel->countMtdRecorded()                  : 0,
            'procurement_spend' => $this->prModel        ? $this->prModel->sumMtdApprovedSpend()                     : 0,
            'budget'            => 1300000,  // TODO: move to config table
            'prs_submitted'     => $this->prModel        ? $this->prModel->countMtdSubmitted()                       : 0,
            'prs_approved'      => $this->prModel        ? $this->prModel->countMtdApproved()                        : 0,
            'stock_shortfalls'  => $this->inventoryModel ? $this->inventoryModel->countBelowMin()                    : 0,
        ];

        $this->renderCeo('reports', [
            'title'      => 'CEO - Reports & Analytics',
            'activePage' => 'reports',
            'reports'    => $reports,
            'metrics'    => $metrics,
            'monthLabel' => date('F Y'),
        ]);
    }

    /* =================================================
       GET /ceo/exportReport/:key — CSV download
       ================================================= */
    public function exportReport(array $params = []): void
    {
        $key = $params['key'] ?? null;

        $allowed = ['forecast-accuracy','procurement-spend','inventory-variance','event-summary','low-stock'];

        if (!in_array($key, $allowed, true)) {
            http_response_code(404);
            exit('Report not found.');
        }

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $key . '-' . date('Y-m-d') . '.csv"');

        $out = fopen('php://output', 'w');

        $this->prModel        = $this->model('PurchaseRequisition');
        $this->varianceModel  = $this->model('ForecastVariance');
        $this->inventoryModel = $this->model('Inventory');

        switch ($key) {
            case 'forecast-accuracy':
                fputcsv($out, ['Event','Date','Forecast','Actual','Variance %']);
                if ($this->varianceModel) {
                    foreach ($this->varianceModel->getMtd() as $r) {
                        fputcsv($out, [$r->event_name, $r->event_date, $r->forecast_guests, $r->actual_guests, $r->variance_pct]);
                    }
                }
                break;

            case 'procurement-spend':
                fputcsv($out, ['PR Ref','Supplier','Category','Amount (LKR)','Date']);
                if ($this->prModel) {
                    foreach ($this->prModel->getMtdApproved() as $r) {
                        fputcsv($out, [$r->pr_number, $r->supplier_name, $r->category_name, $r->total_estimated_cost, $r->created_at]);
                    }
                }
                break;

            case 'low-stock':
                fputcsv($out, ['Ingredient','Category','Min Stock','Current Stock','Unit']);
                if ($this->inventoryModel) {
                    foreach ($this->inventoryModel->getBelowMinItems() as $r) {
                        fputcsv($out, [$r->ingredient_name, $r->category_name, $r->min_stock, $r->current_stock, $r->unit]);
                    }
                }
                break;

            // 'inventory-variance' & 'event-summary' — add when models ready
        }

        fclose($out);
        exit;
    }
}