<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $routine = htmlspecialchars($_POST['routine']);
    if(!empty($routine)){
        // Store routine in session & cookie
        $_SESSION['routine'] = $routine;
        setcookie("routine", $routine, time()+86400, "/"); // 1 day

        echo "Routine saved successfully!";
    } else {
        echo "Please select a skin type.";
    }
} else {
    echo "Invalid request.";
}
