<?php
include('connection.php');

$id = (int)$_POST['id'];
$sub_cat_name = trim($_POST['sub_cat_name']);

$update_img = '';
$img_field = $_FILES['sub_cat_img'];

if (!empty($img_field['name'])) {
    $ext = strtolower(pathinfo($img_field["name"], PATHINFO_EXTENSION));
    $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];

    if (!in_array($ext, $allowed_ext)) {
        echo "<script>alert('Invalid image type. Only JPG, PNG, WEBP allowed.'); window.history.back();</script>";
        exit;
    }

    $new_img_name = uniqid('subcat_') . '.' . $ext;
    $upload_dir = "uploads/subcategory/" . $id;

    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $upload_path = $upload_dir . "/" . $new_img_name;
    move_uploaded_file($img_field["tmp_name"], $upload_path);

    // Prepare image update part
    $update_img = ", sub_cat_img = '" . $new_img_name . "'";
}

// Update query
$sql = "UPDATE sub_category 
        SET sub_cat_name = '" . mysqli_real_escape_string($conn, $sub_cat_name) . "'
            $update_img
        WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Sub Category Updated Successfully'); window.location.href='subCategoryList.php';</script>";
} else {
    echo "<script>alert('Error while updating.'); window.history.back();</script>";
}
