<?php
include('connection.php');

if (!isset($_GET['id'])) {
    echo '<script>alert("No Product ID Provided!"); window.location.href = "productList.php";</script>';
    exit;
}

$product_id = (int)$_GET['id'];

// Get image name before deleting the product
$getImageQuery = mysqli_query($conn, "SELECT product_image FROM products WHERE id = '$product_id'");
$productData = mysqli_fetch_assoc($getImageQuery);

if (!$productData) {
    echo '<script>alert("Product not found!"); window.location.href = "productList.php";</script>';
    exit;
}

// Delete product from DB
$deleteQuery = mysqli_query($conn, "DELETE FROM products WHERE id = '$product_id'");

if ($deleteQuery) {
    // Delete uploaded image folder
    $uploadDir = "uploads/products/" . $product_id;

    // Remove files first, then directory
    if (file_exists($uploadDir)) {
        $files = glob($uploadDir . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        rmdir($uploadDir); // Remove the folder
    }

    echo '<script>alert("Product Deleted Successfully!"); window.location.href = "productList.php";</script>';
} else {
    echo '<script>alert("Error deleting product!"); window.location.href = "productList.php";</script>';
}
