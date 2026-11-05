<?php include('header.php'); ?>
<?php include('connection.php');

if (!isset($_GET['id'])) {
    echo "<script>alert('Sub Category ID missing.'); window.location.href='subCategoryList.php';</script>";
    exit;
}

$id = (int)$_GET['id'];
$sql = "SELECT * FROM sub_category WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "<script>alert('Sub Category not found.'); window.location.href='subCategoryList.php';</script>";
    exit;
}

// Fetch categories for dropdown
$cat_sql = "SELECT id, category_name FROM category_master";
$cat_result = mysqli_query($conn, $cat_sql);
?>

<main>
<div class="content pt-5">
    <div class="container mt-5">
        <h2>Edit Sub Category</h2>
        <form action="subCategoryUpdateBackend.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <div class="mb-3">
                <label class="form-label">Sub Category Name</label>
                <input type="text" name="sub_cat_name" class="form-control" value="<?php echo htmlspecialchars($row['sub_cat_name']); ?>" required>
            </div>

      

            <div class="mb-3">
                <label class="form-label">Current Image</label><br>
                <?php if ($row['sub_cat_img']) { ?>
                    <img src="uploads/subcategory/<?php echo $row['id']; ?>/<?php echo $row['sub_cat_img']; ?>" width="100">
                <?php } else {
                    echo "No image";
                } ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Change Image (optional)</label>
                <input type="file" name="sub_cat_img" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Sub Category</button>
        </form>
    </div>
    </div>
</main>

<?php include('footer.php'); ?>
