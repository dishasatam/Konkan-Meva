
<?php
// categoryAddBackend.php
include('connection.php');

$category_name = $_POST['category_name'];
$category_image = $_FILES['category_img'];

$ext = strtolower(pathinfo($category_image["name"], PATHINFO_EXTENSION));
$Renamefile = $category_name.".". $ext;

$data = array(
    "category_name" => "'" . $category_name . "'",
    "category_image" => "'" . $Renamefile . "'"
);

$columns = implode(',', array_keys($data));
$values = implode(',', array_values($data));

$sql = "INSERT INTO `category_master` ($columns) VALUES ($values)";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $target_dir = "uploads/category/" . $last_id;
    if (!file_exists($target_dir)) {
        mkdir($target_dir);
    }
    move_uploaded_file($category_image["tmp_name"], $target_dir . "/" . $Renamefile);

    echo '<script>alert("Category Saved Successfully!"); window.location.href = "categoryList.php";</script>';
} else {
    echo '<script>alert("Error Occured! category not Saved!"); window.location.href = "categoryList.php";</script>';
}
?>