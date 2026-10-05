<?php

require_once __DIR__. '/../Core/Database.php';
require_once __DIR__. '/CategorySeed.php';

$database = new Database();
$conn = $database->getConnection();

$seeders = [
    'CategorySeed'
];

if($argc > 1){
    //if argument more than one
    $seederName = $argv[1];

    if(!in_array($seederName, $seeders, true)){
        echo "{$seederName} is not found \n";
        exit();
    }

    $seeder = new $seederName();
    $seeder->run($conn);

    echo "Seeding complete {$seederName}";

}else{
    //not specific seed file
    foreach ($seeders as $seederName) {

        $seeder = new $seederName();
        $seeder->run($conn);

        echo "{$seederName} completed successfully.\n";
    }

    echo "All seeders completed successfully.\n";
}