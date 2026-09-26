<?php
class KitchenController extends Controller {

    private function requireKitchenManager(): void
    {
        $baseUrl = defined('BASE_URL') ? BASE_URL : '/dinecast';

        if (!isset($_SESSION['userId'])){
            header("Location: {$baseUrl}/");
            exit;
        }

        if (($_SESSION['role']??'')!=='Kitchen Manager'){
            http_response_code(403);
            exit('Forbidden');
        }
    }

    public function __construct() {
        $this->requireKitchenManager();
    }
    public function dashboard(array $params = []): void {
        $this->render('kitchen');
    }

    public function home(array $params = []){
        require_once __DIR__ . '/../Models/Event.php';

        $events = Event::all();
        $stats = Event::stats($events);
        $today = new DateTimeImmutable('today');
        $nextWeek = $today->modify('+7 days');
        $upcomingEvents = array_values(array_filter($events, static function ($event) use ($today, $nextWeek) {
            $date = new DateTimeImmutable($event['event_date']);
            return $date >= $today && $date <= $nextWeek && ($event['status'] ?? '') !== 'Cancelled';
        }));
        $monthEvents = array_values(array_filter($events, static function ($event) use ($today) {
            return (new DateTimeImmutable($event['event_date']))->format('Y-m') === $today->format('Y-m');
        }));
        $recentForecasts = array_map(static function ($event) {
            $date = new DateTimeImmutable($event['event_date']);
            return [
                'title' => 'Forecast — ' . $event['name'],
                'dates' => $date->format('d M Y'),
            ];
        }, array_slice(array_reverse($events), 0, 3));

        $this->renderWithLayout('kitchen/home','kitchen/layout',[
            'title'      => 'Kitchen Manager - Dashboard',
            'activePage' => 'home',
            'stats'      => $stats,
            'events'     => $events,
            'upcomingEvents' => $upcomingEvents,
            'monthEvents' => $monthEvents,
            'recentForecasts' => $recentForecasts,
        ]);
    }
    public function events(array $params = []){
        require_once __DIR__ . '/../Models/Event.php';

        $events = Event::all();
        $events = array_values(array_filter($events, static fn($event) => (int)$event['registered_guests'] > 20));
        $stats = Event::stats($events);
        $message = $_GET['msg'] ?? null;
        $dbError = null;

        $this->renderWithLayout('kitchen/events','kitchen/layout',[
            'title' => 'Kitchen Manager - Events',
            'activePage' => 'events',
            'events' => $events,
            'stats' => $stats,
            'message' => $message,
            'dbError' => $dbError,
        ]);
    }

    public function createEvent(array $params = []): void {
        require_once __DIR__ . '/../Models/Event.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Event::create($_POST);
        }

        $baseUrl = defined('BASE_URL') ? BASE_URL : '/dinecast';
        header("Location: {$baseUrl}/kitchen/events?msg=created");
        exit;
    }

    public function updateEvent(array $params = []): void {
        require_once __DIR__ . '/../Models/Event.php';

        $id = (int)($params['id'] ?? $_POST['id'] ?? 0);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id > 0) {
            Event::update($id, $_POST);
        }

        $baseUrl = defined('BASE_URL') ? BASE_URL : '/dinecast';
        header("Location: {$baseUrl}/kitchen/events?msg=updated");
        exit;
    }

    public function deleteEvent(array $params = []): void {
        require_once __DIR__ . '/../Models/Event.php';

        $id = (int)($params['id'] ?? $_POST['id'] ?? 0);
        if ($id > 0) {
            Event::delete($id);
        }

        $baseUrl = defined('BASE_URL') ? BASE_URL : '/dinecast';
        header("Location: {$baseUrl}/kitchen/events?msg=deleted");
        exit;
    }

    public function bookings(array $params = []){
        $this->renderWithLayout('kitchen/bookings','kitchen/layout',[
            'title' => 'Kitchen Manager - Dashboard',
            'activePage' => 'bookings',
        ]);
    }
    public function forecast(array $params = []){
        $this->renderWithLayout('kitchen/forecast','kitchen/layout',[
            'title' => 'Kitchen Manager - Dashboard',
            'activePage' => 'forecast',
        ]);
    }
    public function pr(array $params = []){
        $this->renderWithLayout('kitchen/pr','kitchen/layout',[
            'title' => 'Kitchen Manager - Dashboard',
            'activePage' => 'pr',
        ]);
    }
    public function attendance(array $params = []){
        $this->renderWithLayout('kitchen/attendance','kitchen/layout',[
            'title' => 'Kitchen Manager - Dashboard',
            'activePage' => 'attendance',
        ]);
    }
}
