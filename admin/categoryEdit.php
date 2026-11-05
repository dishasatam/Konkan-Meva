
<?php
// categoryEdit.php
include('connection.php');
include('header.php');

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM category_master WHERE id = '$id'");
$row = mysqli_fetch_assoc($result);
?>
<div class="content pt-5">
    <div class="container mt-4">
        <h4>Edit Category</h4>
        <form action="categoryUpdateBackend.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="mb-3">
                <label>Category Name</label>
                <input type="text" name="category_name" class="form-control" value="<?= $row['category_name'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Category Image</label><br>
                <img src="uploads/category/<?= $row['id'] ?>/<?= $row['category_image'] ?>" width="50"><br>
                <input type="file" name="category_img" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Update Category</button>
        </form>
    </div>
</div>
<?php include('footer.php'); ?>
