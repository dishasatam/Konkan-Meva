<?php
session_start();
include('connection.php');

$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];

if ($user_id == 0) {
    echo "Please log in to add items to the wishlist.";
    exit;
}

// Check if product is already in wishlist
$check_wishlist = mysqli_query($conn, "SELECT * FROM wishlist WHERE user_id='$user_id' AND product_id='$product_id'");

if (mysqli_num_rows($check_wishlist) > 0) {
    echo "Product is already in your wishlist.";
} else {
    $insert_wishlist = mysqli_query($conn, "INSERT INTO wishlist (user_id, product_id) VALUES ('$user_id', '$product_id')");
    echo "Product added to wishlist successfully.";
}
?>
