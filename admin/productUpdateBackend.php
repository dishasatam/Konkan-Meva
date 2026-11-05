<?php
include('connection.php');

$id = $_POST['product_id'];
$product_name = trim($_POST['product_name']);
$product_cat = $_POST['category_id'];
$product_price = $_POST['price'];
$product_qty = $_POST['qty'];
$product_img = $_FILES['product_image'];

// Check if subcategory_id is provided (only if category_id is 1)
if ($product_cat == 1) {
    $subcategory_id = $_POST['subcategory_id'];
} else {
    $subcategory_id = 0;
}

// Prepare fields to update
$update_fields = [
    "product_name" => "'" . mysqli_real_escape_string($conn, $product_name) . "'",
    "category_id"  => "'" . (int)$product_cat . "'",
    "subcategory_id" => "'" . (int)$subcategory_id . "'",
    "price"        => "'" . (float)$product_price . "'",
    "qty"          => "'" . (int)$product_qty . "'"
];

// If new image uploaded
if ($product_img['name'] != '') {
    $ext = strtolower(pathinfo($product_img["name"], PATHINFO_EXTENSION));
    $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
    
    if (!in_array($ext, $allowed_ext)) {
        echo "<script>alert('Invalid image type. Only JPG, PNG, WEBP allowed.'); window.history.back();</script>";
        exit;
    }

    // Rename and prepare image
    $Renamefile = uniqid('prod_') . '.' . $ext;
    $update_fields["product_image"] = "'" . $Renamefile . "'";

    // Upload image
    $target_dir = "uploads/products/" . $id;
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . "/" . $Renamefile;
    move_uploaded_file($product_img["tmp_name"], $target_file);
}

// Build update query
$set_clause = '';
foreach ($update_fields as $key => $value) {
    $set_clause .= "$key = $value, ";
}
$set_clause = rtrim($set_clause, ', ');

$sql = "UPDATE products SET $set_clause WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Product Updated Successfully!"); window.location.href = "productList.php";</script>';
} else {
    echo '<script>alert("Error occurred! Product not updated."); window.location.href = "productList.php";</script>';
}
?>
