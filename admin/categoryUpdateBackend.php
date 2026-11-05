<?php
// categoryUpdateBackend.php
include('connection.php');

$id = $_POST['id'];
$category_name = $_POST['category_name'];
$category_image = $_FILES['category_img'];

$updateImage = '';
if (!empty($category_image['name'])) {
    $ext = strtolower(pathinfo($category_image["name"], PATHINFO_EXTENSION));
    $Renamefile = $category_name.".".$ext;
    $updateImage = ", category_image = '$Renamefile'";
    $target_dir = "uploads/category/" . $id;
    if (!file_exists($target_dir)) {
        mkdir($target_dir);
    }
    move_uploaded_file($category_image["tmp_name"], $target_dir . "/" . $Renamefile);
}

$sql = "UPDATE category_master SET category_name = '$category_name' $updateImage WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Category Updated Successfully!"); window.location.href = "categoryList.php";</script>';
} else {
    echo '<script>alert("Error Occured! Category not updated!"); window.location.href = "categoryList.php";</script>';
}
?>
