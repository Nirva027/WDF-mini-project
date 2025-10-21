<?php
session_start();

// Initialize reviews array if not exists
if(!isset($_SESSION['reviews'])) {
    $_SESSION['reviews'] = [
        ['name'=>'Priya','text'=>'GlowCare changed my skin game!'],
        ['name'=>'Aarav','text'=>'Feels luxurious and gentle.']
    ];
}

// Return JSON
header('Content-Type: application/json');

$userName = '';
if(isset($_SESSION['user'])) {
    $userName = $_SESSION['user']['name'];
} elseif(isset($_COOKIE['user_name'])) {
    $userName = $_COOKIE['user_name'];
}

echo json_encode([
    'reviews' => $_SESSION['reviews'],
    'user' => $userName
]);
