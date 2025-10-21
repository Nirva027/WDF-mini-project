<?php
session_start();

$routine = '';
if(isset($_SESSION['routine'])){
    $routine = $_SESSION['routine'];
} elseif(isset($_COOKIE['routine'])){
    $routine = $_COOKIE['routine'];
}

echo $routine;
