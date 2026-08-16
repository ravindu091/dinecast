<?php

// Load environment variables from .env file in the project root
$dotenvPath = __DIR__ . '/../../.env';
if (file_exists($dotenvPath)) {
    $env = parse_ini_file($dotenvPath);
} else {
    die(".env file not found. Please create one in the project root.");
}

$host = $env['DB_HOST'] ?? 'localhost';
$username = $env['DB_USERNAME'] ?? 'root';
$password = $env['DB_PASSWORD'] ?? '';
$database = $env['DB_DATABASE'] ?? 'dinecast';
$port = (int)($env['DB_PORT'] ?? 17006);

$conn = new mysqli($host, $username, $password, $database, $port);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>