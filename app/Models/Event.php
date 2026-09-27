<?php

require_once __DIR__ . '/../Core/Database.php';

class Event {

    /**
     * Retrieve all events ordered by date.
     */
    public static function all(): array {
        $pdo = (new Database())->getConnection();
        if (!$pdo) {
            return [];
        }

        $stmt = $pdo->query("SELECT * FROM `events` ORDER BY `event_date` ASC, `id` ASC");
        return $stmt->fetchAll();
    }

    /**
     * Find a single event by ID.
     */
    public static function find(int $id): ?array {
        $pdo = (new Database())->getConnection();
        if (!$pdo) {
            return null;
        }

        $stmt = $pdo->prepare("SELECT * FROM `events` WHERE `id` = ?");
        $stmt->execute([$id]);
        $event = $stmt->fetch();
        return $event ?: null;
    }

    /**
     * Create a new event.
     */
    public static function create(array $data): string {
        $pdo = (new Database())->getConnection();
        if (!$pdo) {
            return 'failed';
        }

        $name = trim($data['name'] ?? '');
        $eventDate = $data['event_date'] ?? date('Y-m-d');
        if ($name === '') {
            return 'failed';
        }

        $duplicate = $pdo->prepare("SELECT 1 FROM `events`
            WHERE LOWER(TRIM(`name`)) = LOWER(?) AND `event_date` = ?
            LIMIT 1");
        $duplicate->execute([$name, $eventDate]);
        if ($duplicate->fetchColumn()) {
            return 'duplicate';
        }

        $registered = (int)($data['registered_guests'] ?? 0);
        $factor = (int)($data['attendance_factor'] ?? 80);
        $forecast = (int)round($registered * ($factor / 100));
        $menu = !empty($data['menu']) ? trim($data['menu']) : null;
        $status = in_array($data['status'] ?? '', ['Confirmed', 'Tentative', 'Cancelled']) 
            ? $data['status'] 
            : 'Tentative';

        $stmt = $pdo->prepare("INSERT INTO `events` 
            (`name`, `type`, `event_date`, `registered_guests`, `attendance_factor`, `forecast_guests`, `menu`, `status`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        return $stmt->execute([
            $name,
            trim($data['type'] ?? 'Other'),
            $eventDate,
            $registered,
            $factor,
            $forecast,
            $menu,
            $status
        ]) ? 'created' : 'failed';
    }

    /**
     * Update an existing event.
     */
    public static function update(int $id, array $data): string {
        $pdo = (new Database())->getConnection();
        if (!$pdo) {
            return 'failed';
        }

        $name = trim($data['name'] ?? '');
        $eventDate = $data['event_date'] ?? date('Y-m-d');
        if ($name === '') {
            return 'failed';
        }

        $duplicate = $pdo->prepare("SELECT 1 FROM `events`
            WHERE LOWER(TRIM(`name`)) = LOWER(?) AND `event_date` = ? AND `id` <> ?
            LIMIT 1");
        $duplicate->execute([$name, $eventDate, $id]);
        if ($duplicate->fetchColumn()) {
            return 'duplicate';
        }

        $registered = (int)($data['registered_guests'] ?? 0);
        $factor = (int)($data['attendance_factor'] ?? 80);
        $forecast = (int)round($registered * ($factor / 100));
        $menu = !empty($data['menu']) ? trim($data['menu']) : null;
        $status = in_array($data['status'] ?? '', ['Confirmed', 'Tentative', 'Cancelled']) 
            ? $data['status'] 
            : 'Tentative';

        $stmt = $pdo->prepare("UPDATE `events` SET 
            `name` = ?,
            `type` = ?,
            `event_date` = ?,
            `registered_guests` = ?,
            `attendance_factor` = ?,
            `forecast_guests` = ?,
            `menu` = ?,
            `status` = ?
            WHERE `id` = ?");

        return $stmt->execute([
            $name,
            trim($data['type'] ?? 'Other'),
            $eventDate,
            $registered,
            $factor,
            $forecast,
            $menu,
            $status,
            $id
        ]) ? 'updated' : 'failed';
    }

    /**
     * Delete an event by ID.
     */
    public static function delete(int $id): bool {
        $pdo = (new Database())->getConnection();
        if (!$pdo) {
            return false;
        }

        $stmt = $pdo->prepare("DELETE FROM `events` WHERE `id` = ?");
        return $stmt->execute([$id]);
    }

    /**
     * Summary statistics for the top KPI cards.
     */
    public static function stats(array $events): array {
        $total = count($events);
        $confirmed = 0;
        $tentative = 0;
        $totalGuests = 0;

        foreach ($events as $ev) {
            if ($ev['status'] === 'Confirmed') {
                $confirmed++;
            } elseif ($ev['status'] === 'Tentative') {
                $tentative++;
            }
            $totalGuests += (int)$ev['registered_guests'];
        }

        return [
            'total' => $total,
            'confirmed' => $confirmed,
            'tentative' => $tentative,
            'total_guests' => $totalGuests,
        ];
    }
}
