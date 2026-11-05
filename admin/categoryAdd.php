<?php
// categoryAdd.php
include('header.php');
?>
<div class="content pt-5">
    <div class="container mt-4">
        <h4>Add Category</h4>
        <form action="categoryAddBackend.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Category Name</label>
                <input type="text" name="category_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Category Image</label>
                <input type="file" name="category_img" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Add Category</button>
        </form>
    </div>
</div>
<?php include('footer.php'); ?>