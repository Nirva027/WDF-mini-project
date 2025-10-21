<?php
session_start();

// Basic cookie & session handling
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']); // In real projects, hash it!

    if (!empty($name) && !empty($email) && !empty($password)) {

        // Store in session
        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email
        ];

        // Set cookie for 1 day
        setcookie("user_email", $email, time() + 86400, "/");

        echo "Registration successful! Welcome, $name.";
    } else {
        echo "Please fill all fields!";
    }
} else {
    echo "Invalid request.";
}
?>
