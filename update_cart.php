<?php
session_start();
include('connection.php');

$cart_id = $_POST['cart_id'];
$qty = $_POST['qty'];

mysqli_query($conn, "UPDATE cart SET qty='$qty' WHERE id='$cart_id'");

echo "<script>alert('Quantity updated successfully.'); window.location.href='cart.php';</script>";
