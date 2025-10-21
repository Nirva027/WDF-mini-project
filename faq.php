<?php
session_start();

// Check if user has visited before using cookie
if (isset($_COOKIE['visited'])) {
    echo "👋 Welcome back! You last visited on " . $_COOKIE['visited'];
} else {
    echo "🎉 Welcome to SilvaGlow FAQ for the first time!";
}

// Set/update session
$_SESSION['last_page'] = 'faq';

// Store current visit time in cookie (expires in 7 days)
setcookie('visited', date("Y-m-d H:i:s"), time() + (7 * 24 * 60 * 60), "/");
?>
