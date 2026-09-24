<?php

class Database {
    private static ?PDO $instance = null;
    private static ?string $lastError = null;

    public static function getLastError(): ?string {
        return self::$lastError;
    }

    public static function getConnection(): ?PDO {
        if (self::$instance === null) {
            $dotenvPath = __DIR__ . '/../../.env';
            $env = [];

            if (file_exists($dotenvPath)) {
                $lines = file($dotenvPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($lines as $line) {
                    $line = trim($line);
                    if ($line === '' || strpos($line, '#') === 0) continue;
                    $parts = explode('=', $line, 2);
                    if (count($parts) === 2) {
                        $key = trim($parts[0]);
                        $val = trim($parts[1], " \t\n\r\0\x0B\"'");
                        $env[$key] = $val;
                    }
                }
            }

            $host = $env['DB_HOST'] ?? 'localhost';
            $port = (int)($env['DB_PORT'] ?? 3306);
            $user = $env['DB_USERNAME'] ?? 'root';
            $pass = $env['DB_PASSWORD'] ?? '';
            $dbname = $env['DB_DATABASE'] ?? 'dinecastdb';

            try {
                $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_TIMEOUT => 5,
                ];

                self::$instance = new PDO($dsn, $user, $pass, $options);
                self::$lastError = null;

                // Auto-create events table if it does not exist
                self::initSchema(self::$instance);

            } catch (PDOException $e) {
                self::$lastError = $e->getMessage();
                error_log("Database connection error: " . $e->getMessage());
                return null;
            }
        }

        return self::$instance;
    }

    private static function initSchema(PDO $pdo): void {
        $tableSql = "CREATE TABLE IF NOT EXISTS `events` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `name` VARCHAR(255) NOT NULL,
            `type` VARCHAR(100) NOT NULL DEFAULT 'Other',
            `event_date` DATE NOT NULL,
            `registered_guests` INT NOT NULL DEFAULT 0,
            `attendance_factor` INT NOT NULL DEFAULT 80,
            `forecast_guests` INT NOT NULL DEFAULT 0,
            `menu` VARCHAR(150) DEFAULT NULL,
            `status` ENUM('Confirmed', 'Tentative', 'Cancelled') NOT NULL DEFAULT 'Tentative',
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        $pdo->exec($tableSql);

        // Check if table is empty, seed demo data for interim presentation
        $count = (int)$pdo->query("SELECT COUNT(*) FROM `events`")->fetchColumn();
        if ($count === 0) {
            $stmt = $pdo->prepare("INSERT INTO `events` 
                (`name`, `type`, `event_date`, `registered_guests`, `attendance_factor`, `forecast_guests`, `menu`, `status`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            $seed = [
                ['Wedding Reception – Perera', 'Wedding', '2026-08-12', 200, 80, 160, 'Wedding Banquet Menu A', 'Confirmed'],
                ['Corporate Function – ABC Ltd', 'Corporate', '2026-08-13', 45, 60, 27, NULL, 'Tentative'],
                ['Birthday Dinner – Silva', 'Birthday', '2026-08-14', 20, 80, 16, 'Festive Dinner Buffet', 'Confirmed'],
                ['Tech Conference – NovaTech', 'Conference', '2026-08-16', 50, 80, 40, 'Corporate Lunch Set', 'Confirmed'],
                ['Seminar – Edu Board', 'Seminar', '2026-08-20', 500, 60, 300, NULL, 'Tentative'],
            ];

            foreach ($seed as $row) {
                $stmt->execute($row);
            }
        }
    }
}
