<?php
// Turn off warnings so only JSON is sent
error_reporting(0);
header("Content-Type: application/json");
session_start();

// Dummy credentials for testing
$validEmail = "user@silvaglow.com";
$validPassword = "12345";

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Simple validation
if ($email === $validEmail && $password === $validPassword) {
    $_SESSION['user'] = $email;
    setcookie("user_email", $email, time() + 3600, "/");
    echo json_encode([
        "status" => "success",
        "message" => "Login successfully!"
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid email or password!"
    ]);
}
?>
