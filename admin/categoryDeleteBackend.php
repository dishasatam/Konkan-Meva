
<?php
// categoryDeleteBackend.php
include('connection.php');

if (!isset($_GET['id'])) {
    echo '<script>alert("No Category ID Provided!"); window.location.href = "categoryList.php";</script>';
    exit;
}

$id = $_GET['id'];
$getImageQuery = mysqli_query($conn, "SELECT category_image FROM category_master WHERE id = '$id'");
$data = mysqli_fetch_assoc($getImageQuery);

if (!$data) {
    echo '<script>alert("Category not found!"); window.location.href = "categoryList.php";</script>';
    exit;
}

$deleteQuery = mysqli_query($conn, "DELETE FROM category_master WHERE id = '$id'");

if ($deleteQuery) {
    $uploadDir = "uploads/category/" . $id;
    if (file_exists($uploadDir)) {
        $files = glob($uploadDir . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        rmdir($uploadDir);
    }
    echo '<script>alert("Category Deleted Successfully!"); window.location.href = "categoryList.php";</script>';
} else {
    echo '<script>alert("Error deleting category!"); window.location.href = "categoryList.php";</script>';
}
?>