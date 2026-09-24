<?php
class KitchenController extends Controller {
    public function dashboard(array $params = []): void {
        $this->render('kitchen');
    }

    public function home(array $params = []){
        require_once __DIR__ . '/../Models/Event.php';

        $events = Event::all();
        $stats = Event::stats($events);

        $this->renderWithLayout('kitchen/home','kitchen/layout',[
            'title' => 'Kitchen Manager - Dashboard',
            'activePage' => 'home',
            'stats' => $stats,
        ]);
    }
    public function events(array $params = []){
        require_once __DIR__ . '/../Models/Event.php';

        $events = Event::all();
        $stats = Event::stats($events);
        $message = $_GET['msg'] ?? null;
        $dbError = Database::getLastError();

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
