<?php
include('connection.php');

if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid request. ID missing.'); window.location.href='subCategoryList.php';</script>";
    exit;
}

$id = (int)$_GET['id'];

// Get image name before deletion
$get_sql = "SELECT sub_cat_img FROM sub_category WHERE id = $id";
$get_result = mysqli_query($conn, $get_sql);
$row = mysqli_fetch_assoc($get_result);

if (!$row) {
    echo "<script>alert('Sub Category not found.'); window.location.href='subCategoryList.php';</script>";
    exit;
}

// Delete record from DB
$delete_sql = "DELETE FROM sub_category WHERE id = $id";
if (mysqli_query($conn, $delete_sql)) {

    // Delete image and folder
    $folder = "uploads/subcategory/" . $id;
    if (is_dir($folder)) {
        // Delete files in the folder
        $files = glob($folder . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        // Remove the directory
        rmdir($folder);
    }

    echo "<script>alert('Sub Category deleted successfully.'); window.location.href='subCategoryList.php';</script>";
} else {
    echo "<script>alert('Failed to delete sub category.'); window.location.href='subCategoryList.php';</script>";
}
?>
