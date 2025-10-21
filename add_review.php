<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = htmlspecialchars($_POST['name']);
    $review = htmlspecialchars($_POST['review']);

    if(!empty($name) && !empty($review)){
        // Store review in session
        if(!isset($_SESSION['reviews'])){
            $_SESSION['reviews'] = [];
        }
        $_SESSION['reviews'][] = ['name'=>$name,'text'=>$review];

        // Store user session & cookie
        $_SESSION['user'] = ['name'=>$name];
        setcookie('user_name', $name, time()+86400, "/");

        echo "Thank you for your review!";
    } else {
        echo "Please fill out all fields.";
    }
} else {
    echo "Invalid request.";
}
