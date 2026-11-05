<?php
include('connection.php');

// Sanitize and fetch inputs
$product_name = trim($_POST['product_name']);
$product_cat = $_POST['category_id'];
$product_price = $_POST['price'];
$product_qty = $_POST['qty'];
$product_img = $_FILES['product_image'];

if ($product_cat == 1) {
    $subcategory_id = $_POST['subcategory_id'];
} else {
    $subcategory_id = 0;
}

// Validate file extension
$ext = strtolower(pathinfo($product_img["name"], PATHINFO_EXTENSION));
$allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
if (!in_array($ext, $allowed_ext)) {
    echo "<script>alert('Invalid image type. Only JPG, PNG, WEBP allowed.'); window.history.back();</script>";
    exit;
}

// Rename image file
$Renamefile = uniqid('prod_') . '.' . $ext;

// Prepare data
$data = array(
    "product_name"   => "'" . mysqli_real_escape_string($conn, $product_name) . "'",
    "category_id"    => "'" . (int)$product_cat . "'",
    "subcategory_id	" => "'" . $subcategory_id . "'",
    "price"          => "'" . (float)$product_price . "'",
    "qty"            => "'" . (int)$product_qty . "'",
    "product_image"  => "'" . $Renamefile . "'"
);

// Build query
$columns = implode(',', array_keys($data));
$values = implode(',', array_values($data));

$sql = "INSERT INTO `products` ($columns) VALUES ($values)";

// Insert and upload image
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $target_dir = "uploads/products/" . $last_id;

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . "/" . $Renamefile;
    move_uploaded_file($product_img["tmp_name"], $target_file);

    echo '<script>alert("Product Saved Successfully!"); window.location.href = "productList.php";</script>';
} else {
    echo '<script>alert("Error occurred! Product not saved."); window.location.href = "productList.php";</script>';
}
