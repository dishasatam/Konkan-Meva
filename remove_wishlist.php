<?php
include('connection.php');

$wishlist_id = $_POST['wishlist_id'];

if (mysqli_query($conn, "DELETE FROM wishlist WHERE id = '$wishlist_id'")) {
    echo "<script>alert('Item removed from wishlist.'); window.location.href='wishlist.php';</script>";
} else {
    echo "<script>alert('Failed to remove item.'); window.location.href='wishlist.php';</script>";
}
