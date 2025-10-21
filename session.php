<?php
session_start();

// Default user
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "Guest";
}

// Cookie check
if (!isset($_COOKIE['visited'])) {
    setcookie("visited", "yes", time() + (86400 * 7)); // 7 days
    $message = "Welcome! Thanks for visiting SilvaGlow for the first time 🌸";
} else {
    $message = "Welcome back to SilvaGlow, " . $_SESSION['username'] . "!";
}

echo $message;
?>
