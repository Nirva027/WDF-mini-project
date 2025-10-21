<?php
session_start();

// Get username from session or cookie
$userName = '';
if(isset($_SESSION['user'])){
    $userName = $_SESSION['user']['name'];
} elseif(isset($_COOKIE['user_name'])){
    $userName = $_COOKIE['user_name'];
}

echo $userName;
