<?php
    session_start();

    // Sample cart item
    $product_id = $_POST['product_id'];
    $product_name = "Sample Product";
    $product_price = 20; // Example price
    
    // Add to cart (using session)
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    // Check if product already in cart
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity']++;
    } else {
        $_SESSION['cart'][$product_id] = [
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => 1
        ];
    }
    
    header("Location: panier.php"); // Redirect to cart page

    

    session_start();

    // Get product ID from request
    $product_id = $_GET['product_id'];

    // Remove item from cart
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }

    header("Location: panier.php"); // Redirect back to cart page
