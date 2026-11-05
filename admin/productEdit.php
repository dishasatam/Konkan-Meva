<?php
include('header.php');

// Get product ID from URL
$id = $_GET['id'];

// Fetch product details
$product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id = $id"));

// Fetch categories and subcategories
$cats = mysqli_query($conn, "SELECT * FROM category_master");
$sub_cats = mysqli_query($conn, "SELECT * FROM sub_category");
?>

<div class="content pt-5">
    <div class="container mt-4">
        <h4>Edit Product</h4>
        <form action="productUpdateBackend.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

            <div class="mb-3">
                <label>Product Name</label>
                <input type="text" name="product_name" class="form-control" value="<?= $product['product_name'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Category</label>
                <select name="category_id" class="form-select" id="category_id" onchange="showSubcategory()">
                    <?php
                    while ($c = mysqli_fetch_assoc($cats)) {
                        $selected = $c['id'] == $product['category_id'] ? 'selected' : '';
                        echo "<option value='{$c['id']}' $selected>{$c['category_name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Subcategory Dropdown, will show only if category_id is 1 -->
            <div class="mb-3" id="subcategory_div" style="<?= $product['category_id'] == 1 ? 'display:block;' : 'display:none;' ?>">
                <label>Subcategory</label>
                <select name="subcategory_id" class="form-select">
                    <?php
                    while ($sub_c = mysqli_fetch_assoc($sub_cats)) {
                        $selected = $sub_c['id'] == $product['subcategory_id'] ? 'selected' : '';
                        echo "<option value='{$sub_c['id']}' $selected>{$sub_c['sub_cat_name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control" value="<?= $product['price'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Quantity</label>
                <input type="number" name="qty" class="form-control" value="<?= $product['qty'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Change Image (optional)</label>
                <input type="file" name="product_image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</div>

<script>
// Show/Hide subcategory dropdown based on category selection
function showSubcategory() {
    const category_id = document.getElementById('category_id').value;
    const subcategory_div = document.getElementById('subcategory_div');
    
    if (category_id == 1) {
        subcategory_div.style.display = 'block';
    } else {
        subcategory_div.style.display = 'none';
    }
}
</script>

<?php include('footer.php'); ?>
