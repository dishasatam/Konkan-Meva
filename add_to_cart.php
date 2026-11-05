<?php
session_start();
include('connection.php');

$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];

if ($user_id == 0) {
    echo "Please log in to add items to the cart.";
    exit;
}

// Check if product is already in cart
$check_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id' AND product_id='$product_id'");

if (mysqli_num_rows($check_cart) > 0) {
    $update_cart = mysqli_query($conn, "UPDATE cart SET qty = qty + 1 WHERE user_id='$user_id' AND product_id='$product_id'");
    echo "Product quantity updated in cart.";
} else {
    $insert_cart = mysqli_query($conn, "INSERT INTO cart (user_id, product_id, qty) VALUES ('$user_id', '$product_id', 1)");
    echo "Product added to cart successfully.";
}
