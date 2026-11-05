<?php
session_start();
include('connection.php');

$cart_id = $_POST['cart_id'];

mysqli_query($conn, "DELETE FROM cart WHERE id='$cart_id'");

echo "<script>alert('Item removed from cart.'); window.location.href='cart.php';</script>";
