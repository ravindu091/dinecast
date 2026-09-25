<?php

class Database{
    private PDO $conn;

    public function __construct(){
        $dotenvPath = __DIR__.'/../../.env';
        if(file_exists($dotenvPath)){
            $env = parse_ini_file($dotenvPath, true);
        } else {
            die(".env file not found. Please create one in the project root.");
        }
            
        $host = $env['DB_HOST'] ?? 'localhost';
        $username = $env['DB_USERNAME'] ?? 'root';
        $password = $env['DB_PASSWORD'] ?? '';
        $database = $env['DB_DATABASE'] ?? 'dinecast';
        $port = (int)($env['DB_PORT'] ?? 17006);

        try{
            $dsn = "mysql:host={$host};port={$port};dbname={$database};charset=utf8mb4";
            $this->conn = new PDO($dsn,$username,$password,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        }catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection(): PDO{
        return $this->conn; 
    }
}
