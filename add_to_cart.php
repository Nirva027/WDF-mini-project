<?php
session_start();

// Initialize cart session if not set
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST['product'] ?? '';
    $price = $_POST['price'] ?? '';

    if ($product && $price) {
        $_SESSION['cart'][] = ['name' => $product, 'price' => $price];
        setcookie("last_product", $product, time() + 3600); // cookie lasts 1 hour
        echo "✅ '$product' has been added to your cart!";
    } else {
        echo "⚠️ Product not added. Missing data!";
    }
    exit;
}
?>
