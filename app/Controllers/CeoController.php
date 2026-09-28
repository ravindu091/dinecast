<?php
/**
 * CEO Controller
 * Handles all CEO / Top Management views.
 *
 * NOTE: All data methods have fallback demo data when models
 *       are not yet implemented. This lets the UI render properly
 *       during development. Replace fallbacks with real queries
 *       once models are ready.
 */

class CeoController extends Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['userId']) || ($_SESSION['role'] ?? '') !== 'ceo') {
            header("Location: " . (defined('BASE_URL') ? BASE_URL : '/dinecast') . "/");
            exit();
        }
    }

    /* =========================================================
       Helper: render with CEO layout
       ========================================================= */
    private function renderCeo(string $view, array $data = []): void
    {
        $data['baseUrl']  = defined('BASE_URL') ? BASE_URL : '/dinecast';
        $data['userName'] = $_SESSION['user_name'] ?? 'Amara Perera';
        $data['userRole'] = $_SESSION['role_label'] ?? 'CEO / Top Management';
        $data['userCode'] = $_SESSION['user_code'] ?? 'DC-CEO-01';

        $this->renderWithLayout($view, 'ceo/layout', $data);
    }

    /* =========================================================
       Fallback demo data
       ========================================================= */
    private function demoKpis(): array
    {
        return [
            'events_this_month'  => 19,
            'events_delta'       => 3,
            'total_guests'       => 3214,
            'guests_delta_pct'   => 8,
            'forecast_accuracy'  => 92,
            'accuracy_delta_pct' => 4,
            'procurement_spend'  => 1240000,
            'spend_delta_pct'    => -2,
            'low_stock_items'    => 12,
        ];
    }

    private function demoForecastChart(): array
    {
        return [
            (object)['event_date'=>'2026-09-18','actual_guests'=>186,'forecast_guests'=>180],
            (object)['event_date'=>'2026-09-19','actual_guests'=>222,'forecast_guests'=>300],
            (object)['event_date'=>'2026-09-20','actual_guests'=>67, 'forecast_guests'=>75],
            (object)['event_date'=>'2026-09-21','actual_guests'=>485,'forecast_guests'=>500],
            (object)['event_date'=>'2026-09-22','actual_guests'=>200,'forecast_guests'=>200],
            (object)['event_date'=>'2026-09-23','actual_guests'=>195,'forecast_guests'=>200],
            (object)['event_date'=>'2026-09-24','actual_guests'=>null,'forecast_guests'=>45],
            (object)['event_date'=>'2026-09-25','actual_guests'=>null,'forecast_guests'=>20],
        ];
    }

    private function demoProcurement(): array
    {
        return [
            (object)['category_name'=>'Meat & Seafood',      'percentage'=>68,'total_spend'=>843200],
            (object)['category_name'=>'Dairy',               'percentage'=>14,'total_spend'=>173600],
            (object)['category_name'=>'Dry Goods',           'percentage'=>9, 'total_spend'=>111600],
            (object)['category_name'=>'Vegetables & Herbs',  'percentage'=>9, 'total_spend'=>111600],
        ];
    }

    private function demoUpcomingEvents(): array
    {
        return [
            (object)['event_id'=>1,'event_name'=>'Wedding Reception – Perera',   'event_date'=>'2026-09-28','registered_guests'=>200,'status'=>'confirmed'],
            (object)['event_id'=>2,'event_name'=>'Corporate Function – ABC Ltd','event_date'=>'2026-09-29','registered_guests'=>45, 'status'=>'tentative'],
            (object)['event_id'=>3,'event_name'=>'Birthday Dinner – Silva',      'event_date'=>'2026-09-30','registered_guests'=>20, 'status'=>'confirmed'],
            (object)['event_id'=>4,'event_name'=>'Tech Conference – NovaTech',   'event_date'=>'2026-10-02','registered_guests'=>50, 'status'=>'upcoming'],
            (object)['event_id'=>5,'event_name'=>'Seminar – Edu Board',          'event_date'=>'2026-10-05','registered_guests'=>500,'status'=>'tentative'],
        ];
    }

    private function demoInventory(): array
    {
        return [
            'normal'      => 1264,
            'below_min'   => 12,
            'near_expiry' => 8,
            'expired'     => 3,
            'trend'       => [
                ['Jan', 40], ['Feb', 55], ['Mar', 32], ['Apr', 70],
                ['May', 48], ['Jun', 38], ['Jul', 62], ['Aug', 82],
            ],
        ];
    }

    private function demoVariance(): array
    {
        return [
            (object)['event_name'=>'Wedding Perera',       'event_date'=>'2026-09-18','registered_guests'=>180,'variance_pct'=> 3.3],
            (object)['event_name'=>'Institutional Lunch',  'event_date'=>'2026-09-19','registered_guests'=>300,'variance_pct'=>-26.0],
            (object)['event_name'=>'Gov Dinner – Ministry','event_date'=>'2026-09-20','registered_guests'=>75, 'variance_pct'=>-10.7],
            (object)['event_name'=>'Seminar – Edu Board',  'event_date'=>'2026-09-21','registered_guests'=>500,'variance_pct'=> -3.0],
            (object)['event_name'=>'Wedding Reception',    'event_date'=>'2026-09-22','registered_guests'=>200,'variance_pct'=> -2.5],
            (object)['event_name'=>'Product Launch',       'event_date'=>'2026-09-23','registered_guests'=>200,'variance_pct'=> -2.5],
        ];
    }

    private function demoAlerts(): array
    {
        return [
            (object)['severity'=>'danger', 'title'=>'12 Ingredients Below Minimum',   'description'=>'Including Salmon, Butter, and Curry Leaves. Review PRs urgently.'],
            (object)['severity'=>'warning','title'=>'PR-0045 Rejected — Rework Pending','description'=>'Chef Sudath must revise the Prawn Cocktail PR before Sep 30.'],
            (object)['severity'=>'warning','title'=>'Fresh Prawns (B-046) Expire Sep 28','description'=>'Batch worth Rs. 9,600 at risk. Allocate to soonest event.'],
            (object)['severity'=>'info',   'title'=>'4 Events Without Menu Assigned', 'description'=>'Cannot generate forecast until menu is linked. Action needed.'],
        ];
    }

    /* =========================================================
       GET /ceo — Executive Overview
       ========================================================= */
    public function home(array $params = []): void
    {
        $this->renderCeo('ceo/home', [
            'title'          => 'CEO – Overview',
            'activePage'     => 'home',
            'kpis'           => $this->demoKpis(),
            'forecastChart'  => $this->demoForecastChart(),
            'procurement'    => $this->demoProcurement(),
            'upcomingEvents' => $this->demoUpcomingEvents(),
            'inventory'      => $this->demoInventory(),
            'variance'       => $this->demoVariance(),
            'alerts'         => $this->demoAlerts(),
            'monthLabel'     => date('F Y'),
            'monthShort'     => date('M'),
        ]);
    }

    /* =========================================================
       GET /ceo/events
       ========================================================= */
    public function events(array $params = []): void
    {
        $events = [
            (object)['event_id'=>1,'event_name'=>'Wedding Reception – Perera','event_date'=>'2026-09-28','event_type'=>'Wedding',    'registered_guests'=>200,'menu_id'=>1,   'forecast_guests'=>180,'status'=>'confirmed'],
            (object)['event_id'=>2,'event_name'=>'Corporate Function – ABC',  'event_date'=>'2026-09-29','event_type'=>'Function',   'registered_guests'=>45, 'menu_id'=>null,'forecast_guests'=>null,'status'=>'tentative'],
            (object)['event_id'=>3,'event_name'=>'Birthday Dinner – Silva',   'event_date'=>'2026-09-30','event_type'=>'Birthday',   'registered_guests'=>20, 'menu_id'=>2,   'forecast_guests'=>18, 'status'=>'confirmed'],
            (object)['event_id'=>4,'event_name'=>'Tech Conference – NovaTech','event_date'=>'2026-10-02','event_type'=>'Conference', 'registered_guests'=>50, 'menu_id'=>3,   'forecast_guests'=>45, 'status'=>'upcoming'],
            (object)['event_id'=>5,'event_name'=>'Seminar – Edu Board',      'event_date'=>'2026-10-05','event_type'=>'Seminar',    'registered_guests'=>500,'menu_id'=>null,'forecast_guests'=>null,'status'=>'tentative'],
            (object)['event_id'=>6,'event_name'=>'Gov Dinner – Ministry',    'event_date'=>'2026-10-08','event_type'=>'Government', 'registered_guests'=>75, 'menu_id'=>4,   'forecast_guests'=>68, 'status'=>'confirmed'],
        ];

        $stats = [
            'total'        => count($events),
            'confirmed'    => 3,
            'tentative'    => 3,
            'total_guests' => 890,
        ];

        $this->renderCeo('ceo/events', [
            'title'      => 'CEO – Events',
            'activePage' => 'events',
            'events'     => $events,
            'stats'      => $stats,
            'monthLabel' => date('F Y'),
        ]);
    }

    /* =========================================================
       GET /ceo/procurement
       ========================================================= */
    public function procurement(array $params = []): void
    {
        $stats = [
            'pending_prs'  => 4,
            'approved_prs' => 6,
            'open_pos'     => 5,
            'total_spend'  => 1240000,
        ];

        $recentPRs = [
            (object)['pr_id'=>1,'pr_number'=>'PR-0042','created_by_name'=>'Chef Sudath','items_summary'=>'Chicken, Rice, Spices',     'event_name'=>'Wedding Reception','submitted_at'=>'2026-09-05','status'=>'pending'],
            (object)['pr_id'=>2,'pr_number'=>'PR-0044','created_by_name'=>'Chef Sudath','items_summary'=>'Vegetables, Eggs, Flour',  'event_name'=>'Birthday Dinner',  'submitted_at'=>'2026-09-06','status'=>'pending'],
            (object)['pr_id'=>3,'pr_number'=>'PR-0043','created_by_name'=>'Chef Sudath','items_summary'=>'Salmon, Butter, Lemon',    'event_name'=>'Corporate Function','submitted_at'=>'2026-09-06','status'=>'approved'],
            (object)['pr_id'=>4,'pr_number'=>'PR-0045','created_by_name'=>'Chef Sudath','items_summary'=>'Prawns, Cream, Cheese',    'event_name'=>'Tech Conference',  'submitted_at'=>'2026-09-07','status'=>'rejected'],
            (object)['pr_id'=>5,'pr_number'=>'PR-0046','created_by_name'=>'Chef Sudath','items_summary'=>'Lamb, Herbs, Red Wine',     'event_name'=>'Gov Dinner',       'submitted_at'=>'2026-09-08','status'=>'approved'],
        ];

        $purchaseOrders = [
            (object)['po_id'=>1,'po_number'=>'PO-2051','supplier_name'=>'Lanka Fresh Meats','items_summary'=>'Chicken, Lamb, Beef','total_value'=>185000,'issued_at'=>'2026-09-06','status'=>'issued'],
            (object)['po_id'=>2,'po_number'=>'PO-2052','supplier_name'=>'Ocean Harvest Ltd','items_summary'=>'Salmon, Prawns',     'total_value'=>96000, 'issued_at'=>'2026-09-07','status'=>'received'],
            (object)['po_id'=>3,'po_number'=>'PO-2053','supplier_name'=>'Green Valley Veg','items_summary'=>'Vegetables, Herbs',   'total_value'=>74000, 'issued_at'=>'2026-09-08','status'=>'issued'],
            (object)['po_id'=>4,'po_number'=>'PO-2054','supplier_name'=>'Ceylon Spice Co', 'items_summary'=>'Spices, Dry Goods',  'total_value'=>42000, 'issued_at'=>'2026-09-09','status'=>'closed'],
        ];

        $supplierSpend = [
            (object)['supplier_name'=>'Lanka Fresh Meats','total_spend'=>385000],
            (object)['supplier_name'=>'Ocean Harvest Ltd','total_spend'=>296000],
            (object)['supplier_name'=>'Green Valley Veg', 'total_spend'=>214000],
            (object)['supplier_name'=>'Ceylon Spice Co',  'total_spend'=>142000],
            (object)['supplier_name'=>'Highland Dairy',   'total_spend'=>103000],
        ];

        $this->renderCeo('ceo/procurement', [
            'title'          => 'CEO – Procurement',
            'activePage'     => 'procurement',
            'stats'          => $stats,
            'recentPRs'      => $recentPRs,
            'purchaseOrders' => $purchaseOrders,
            'supplierSpend'  => $supplierSpend,
            'monthLabel'     => date('F Y'),
            'monthShort'     => date('M'),
        ]);
    }

    /* =========================================================
       GET /ceo/inventory
       ========================================================= */
    public function inventory(array $params = []): void
    {
        $stats = [
            'total_lines' => 1284,
            'below_min'   => 12,
            'near_expiry' => 8,
            'expired'     => 3,
        ];

        $criticalItems = [
            (object)['ingredient_id'=>1,'ingredient_name'=>'Fresh Salmon Fillet',  'category_name'=>'Meat & Seafood','unit'=>'kg','min_stock'=>10, 'current_stock'=>2.5,'pending_pr_id'=>3],
            (object)['ingredient_id'=>2,'ingredient_name'=>'Unsalted Butter',      'category_name'=>'Dairy',         'unit'=>'kg','min_stock'=>5,  'current_stock'=>0.8,'pending_pr_id'=>null],
            (object)['ingredient_id'=>3,'ingredient_name'=>'Fresh Curry Leaves',   'category_name'=>'Spices & Herbs','unit'=>'g', 'min_stock'=>500,'current_stock'=>50, 'pending_pr_id'=>null],
            (object)['ingredient_id'=>4,'ingredient_name'=>'Garlic (Peeled)',      'category_name'=>'Spices & Herbs','unit'=>'g', 'min_stock'=>1000,'current_stock'=>300,'pending_pr_id'=>4],
            (object)['ingredient_id'=>5,'ingredient_name'=>'Lamb Shoulder',        'category_name'=>'Meat & Seafood','unit'=>'kg','min_stock'=>6,  'current_stock'=>4,  'pending_pr_id'=>null],
        ];

        $this->renderCeo('ceo/inventory', [
            'title'         => 'CEO – Inventory',
            'activePage'    => 'inventory',
            'stats'         => $stats,
            'criticalItems' => $criticalItems,
        ]);
    }

    /* =========================================================
       GET /ceo/approvals
       ========================================================= */
    public function approvals(array $params = []): void
    {
        $stats = [
            'pending'     => 4,
            'approved'    => 6,
            'rejected'    => 1,
            'total_value' => 198700,
        ];

        $prs = [
            (object)['pr_id'=>1,'pr_number'=>'PR-0042','raised_by_name'=>'Chef Sudath','items_summary'=>'Chicken, Rice, Spices',   'total_estimated_cost'=>34800,'created_at'=>'2026-09-05','status'=>'pending'],
            (object)['pr_id'=>2,'pr_number'=>'PR-0043','raised_by_name'=>'Chef Sudath','items_summary'=>'Salmon, Butter, Lemon',  'total_estimated_cost'=>48500,'created_at'=>'2026-09-06','status'=>'approved'],
            (object)['pr_id'=>3,'pr_number'=>'PR-0044','raised_by_name'=>'Chef Sudath','items_summary'=>'Vegetables, Eggs, Flour','total_estimated_cost'=>12400,'created_at'=>'2026-09-06','status'=>'pending'],
            (object)['pr_id'=>4,'pr_number'=>'PR-0045','raised_by_name'=>'Chef Sudath','items_summary'=>'Prawns, Cream, Cheese',  'total_estimated_cost'=>28600,'created_at'=>'2026-09-07','status'=>'rejected'],
            (object)['pr_id'=>5,'pr_number'=>'PR-0046','raised_by_name'=>'Chef Sudath','items_summary'=>'Lamb, Herbs, Red Wine',   'total_estimated_cost'=>72200,'created_at'=>'2026-09-08','status'=>'approved'],
            (object)['pr_id'=>6,'pr_number'=>'PR-0047','raised_by_name'=>'Chef Sudath','items_summary'=>'Beef, Mushrooms, Cream',  'total_estimated_cost'=>25100,'created_at'=>'2026-09-09','status'=>'pending'],
        ];

        $this->renderCeo('ceo/approvals', [
            'title'      => 'CEO – PR Approvals',
            'activePage' => 'approvals',
            'prs'        => $prs,
            'stats'      => $stats,
        ]);
    }

    /* =========================================================
       GET /ceo/users — Team Directory
       ========================================================= */
    public function users(array $params = []): void
    {
        $stats = [
            'active_users' => 6,
            'online_users' => 3,
        ];

        $users = [
            (object)['user_id'=>1,'user_name'=>'Amara Perera',        'user_code'=>'DC-CEO-01','role'=>'ceo',              'role_label'=>'CEO / Top Management',       'status'=>'active','is_online'=>true],
            (object)['user_id'=>2,'user_name'=>'Sudath Bandaranayake','user_code'=>'DC-CHF-42','role'=>'chef',             'role_label'=>'Chef / Kitchen Manager',     'status'=>'active','is_online'=>true],
            (object)['user_id'=>3,'user_name'=>'Nadeesha Kumari',     'user_code'=>'DC-STR-11','role'=>'store_manager',    'role_label'=>'Store Manager',              'status'=>'active','is_online'=>false],
            (object)['user_id'=>4,'user_name'=>'Ranjith Silva',       'user_code'=>'DC-PRM-07','role'=>'procurement',      'role_label'=>'Procurement Manager',        'status'=>'active','is_online'=>true],
            (object)['user_id'=>5,'user_name'=>'Kumari Jayawardena',  'user_code'=>'DC-ADM-01','role'=>'admin',            'role_label'=>'System Administrator',       'status'=>'active','is_online'=>false],
            (object)['user_id'=>6,'user_name'=>'Prasad Fernando',     'user_code'=>'DC-KIT-23','role'=>'kitchen_manager',  'role_label'=>'Kitchen Manager',            'status'=>'inactive','is_online'=>false],
        ];

        $this->renderCeo('ceo/users', [
            'title'      => 'CEO – Team Directory',
            'activePage' => 'users',
            'stats'      => $stats,
            'users'      => $users,
        ]);
    }

    /* =========================================================
       GET /ceo/reports
       ========================================================= */
    public function reports(array $params = []): void
    {
        $reports = [
            (object)['title'=>'Forecast Accuracy Report',  'description'=>'Actual vs. Forecast comparison across all events', 'badge_class'=>'bg-green',  'export_key'=>'forecast-accuracy'],
            (object)['title'=>'Procurement Spend Report',  'description'=>'Monthly spend by supplier and category',            'badge_class'=>'bg-blue',   'export_key'=>'procurement-spend'],
            (object)['title'=>'Inventory Variance Report', 'description'=>'Used vs. received quantities per batch',             'badge_class'=>'bg-purple', 'export_key'=>'inventory-variance'],
            (object)['title'=>'Event Summary Report',      'description'=>'Guests, menus, and PR data per event',               'badge_class'=>'bg-orange', 'export_key'=>'event-summary'],
            (object)['title'=>'Low Stock Alert Report',    'description'=>'Items below minimum stock threshold',                'badge_class'=>'bg-red',    'export_key'=>'low-stock'],
        ];

        $metrics = [
            'total_events'      => 19,
            'guests_served'     => 3214,
            'forecast_accuracy' => 92,
            'recorded_events'   => 6,
            'procurement_spend' => 1240000,
            'budget'            => 1300000,
            'prs_submitted'     => 7,
            'prs_approved'      => 6,
            'stock_shortfalls'  => 12,
        ];

        $this->renderCeo('ceo/reports', [
            'title'      => 'CEO – Reports & Analytics',
            'activePage' => 'reports',
            'reports'    => $reports,
            'metrics'    => $metrics,
            'monthLabel' => date('F Y'),
        ]);
    }
}