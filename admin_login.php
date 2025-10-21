<?php
session_start();

// Hardcoded admin credentials
$adminUser = "admin";
$adminPass = "12345";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = htmlspecialchars($_POST['admin-username']);
    $password = htmlspecialchars($_POST['admin-password']);

    if($username === $adminUser && $password === $adminPass){
        $_SESSION['admin'] = $username;
        setcookie("admin_user", $username, time()+3600, "/"); // 1 hour cookie
        echo "Login success! Welcome Admin.";
    } else {
        echo "Invalid username or password!";
    }
} else {
    echo "Invalid request.";
}
