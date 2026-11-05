<?php
include('connection.php');

// Sanitize and fetch input
$sub_category_name = trim($_POST['sub_category_name']);
$sub_category_img = $_FILES['sub_category_image'];

// Validate file extension
$ext = strtolower(pathinfo($sub_category_img["name"], PATHINFO_EXTENSION));
$allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
if (!in_array($ext, $allowed_ext)) {
    echo "<script>alert('Invalid image type. Only JPG, PNG, WEBP allowed.'); window.history.back();</script>";
    exit;
}

// Rename image file
$Renamefile = uniqid('subcat_') . '.' . $ext;

// Prepare data
$data = array(
    "category_id" => "'1'",
    "sub_cat_name" => "'" . mysqli_real_escape_string($conn, $sub_category_name) . "'",
    "sub_cat_img"             => "'" . $Renamefile . "'"
);

// Build query
$columns = implode(',', array_keys($data));
$values = implode(',', array_values($data));

$sql = "INSERT INTO `sub_category` ($columns) VALUES ($values)";

// Insert and upload image
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $target_dir = "uploads/subcategory/" . $last_id;

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . "/" . $Renamefile;
    move_uploaded_file($sub_category_img["tmp_name"], $target_file);

    echo '<script>alert("Sub Category Saved Successfully!"); window.location.href = "subCategoryList.php";</script>';
} else {
    echo '<script>alert("Error occurred! Sub Category not saved."); window.location.href = "subCategoryList.php";</script>';
}
?>
