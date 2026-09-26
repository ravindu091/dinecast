<?php



function getDateTime(){
    $timezone = new DateTimeZone('Asia/Colombo'); 
    $now = new DateTimeImmutable('now', $timezone);

    // Output the date and time
    return $now->format('Y-m-d h:i:s A'); 
    // Output: 2026-09-26 02:12:15 PM
}

function getRole(string $shortRole){
    return match ($shortRole) {
        'admin' => 'Admin',
        'kitchen' => 'Kitchen Manager',
        'chef' => 'Chef',
        'store' => 'Store Manager',
        'procurement' => 'Procurement Manager',
        'ceo' => 'CEO',
        default => null,
    };
}