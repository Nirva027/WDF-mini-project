<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    // Store data in session
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;

    // Store cookie for 1 day
    setcookie("user_name", $name, time() + 86400, "/");

    // Send JSON response for JS to read
    echo json_encode([
        "status" => "success",
        "message" => "Thank you, $name! Your message has been received."
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request method."
    ]);
}
?>
