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

function csrfToken(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function verifyCsrfToken(?string $token): bool {
    return is_string($token)
        && !empty($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $token);
}