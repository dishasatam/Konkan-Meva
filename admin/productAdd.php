<?php include('header.php'); ?>

<style>
    .add_subcategory {
        display: none;
    }
</style>

<div class="content pt-5">
    <div class="container mt-4">
        <h4>Add Product</h4>
        <form action="productAddBackend.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Product Name</label>
                <input type="text" name="product_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Category</label>
                <select name="category_id" class="form-select" id="category_id" required onchange="showSubCategory()">
                    <option value="">Select Category</option>
                    <?php
                    $cats = mysqli_query($conn, "SELECT * FROM category_master");
                    while ($c = mysqli_fetch_assoc($cats)) {
                        echo "<option value='{$c['id']}'>{$c['category_name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3 add_subcategory" id="subcategory_container">
                <label>Subcategory</label>
                <select name="subcategory_id" class="form-select">
                    <?php
                    $sub_cats = mysqli_query($conn, "SELECT * FROM sub_category");
                    while ($sub_c = mysqli_fetch_assoc($sub_cats)) {
                        echo "<option value='{$sub_c['id']}'>{$sub_c['sub_cat_name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Quantity</label>
                <input type="number" name="qty" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Product Image</label>
                <input type="file" name="product_image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Add Product</button>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>

<script>
    function showSubCategory() {
        var categoryId = document.getElementById('category_id').value;
        var subcategoryContainer = document.getElementById('subcategory_container');

        // Check if category_id equals 1
        if (categoryId == '1') {
            subcategoryContainer.style.display = 'block'; // Show subcategory select box
        } else {
            subcategoryContainer.style.display = 'none'; // Hide subcategory select box
        }
    }
</script>