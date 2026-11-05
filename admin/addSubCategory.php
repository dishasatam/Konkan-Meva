<?php include('header.php'); include('connection.php'); ?>
<main>
    <div class="content pt-5">
        <div class="container mt-5">
            <h2>Add Sub Category</h2>
            <form action="subCategoryBackend.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Sub Category Name</label>
                    <input type="text" name="sub_category_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="sub_category_image" class="form-control" accept="image/*" required>
                </div>

                <button type="submit" class="btn btn-primary">Add Sub Category</button>
            </form>
        </div>
    </div>
</main>
<?php include('footer.php'); ?>
