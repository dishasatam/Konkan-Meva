<?php
include('header.php');
include('connection.php');
include('category_list.php');
?>

<main>
    <div style="width: 100%; height: 4px; background: linear-gradient(90deg, #ff6f00, #ffa726, #ff6f00); margin: 0 0 25px 0;"></div>
    <div class="contain">

        <?php
        // Sanitize category ID input
        $category_id = isset($_GET['category']) ? (int)$_GET['category'] : 0;
        $selected_subcategory = isset($_GET['subcategory']) ? (int)$_GET['subcategory'] : 0;

        if ($category_id <= 0) {
            echo "<script>alert('Invalid category ID.'); window.location.href='index.php';</script>";
            exit;
        }

        // Fetch category name
        $Cat_query = "SELECT * FROM category_master WHERE id='$category_id'";
        $category_result = mysqli_query($conn, $Cat_query);
        if ($category_result && mysqli_num_rows($category_result) > 0) {
            $category_data = mysqli_fetch_assoc($category_result);
            $category_name = $category_data['category_name'];
        } else {
            echo "<script>alert('Category not found.'); window.location.href='index.php';</script>";
            exit;
        }
        ?>

        <div class="text-center my-4">
            <h2 class="section-heading" style="color: #ff6f00; font-weight: bold; font-size: 28px;">
                <?php echo htmlspecialchars($category_name); ?>
            </h2>
            <?php if ($category_id == 1): ?>
                <p class="text-muted" style="max-width: 700px; margin: 0 auto 20px;">
                    Handpicked authentic seasonal fruits directly from the coastal farms of Ratnagiri, Devgad, and Sindhudurg. Naturally grown and ripened with care.
                </p>
            <?php endif; ?>
        </div>

        <?php
        // Fetch subcategories for this category (specifically for Konkani Fruits)
        $subCat_query = "SELECT * FROM sub_category WHERE category_id='$category_id'";
        $subCat_result = mysqli_query($conn, $subCat_query);
        $has_subcategories = ($subCat_result && mysqli_num_rows($subCat_result) > 0);
        ?>

        <?php if ($has_subcategories): ?>
            <!-- Subcategory Navigation Pills -->
            <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
                <a href="webproduct.php?category=<?php echo $category_id; ?>" 
                   class="btn <?php echo ($selected_subcategory === 0) ? 'btn-warning text-white' : 'btn-outline-warning text-dark'; ?> rounded-pill px-3 py-2 m-1 font-weight-bold">
                    🌟 All <?php echo htmlspecialchars($category_name); ?>
                </a>
                <?php
                // Reset pointer to reuse
                mysqli_data_seek($subCat_result, 0);
                while ($sub = mysqli_fetch_assoc($subCat_result)) {
                    $isActive = ($selected_subcategory === (int)$sub['id']);
                ?>
                    <a href="webproduct.php?category=<?php echo $category_id; ?>&subcategory=<?php echo $sub['id']; ?>" 
                       class="btn <?php echo $isActive ? 'btn-warning text-white' : 'btn-outline-warning text-dark'; ?> rounded-pill px-3 py-2 m-1">
                        <?php echo htmlspecialchars($sub['sub_cat_name']); ?>
                    </a>
                <?php } ?>
            </div>

            <!-- Subcategory Showcase Cards -->
            <div class="row justify-content-center mb-5 px-3">
                <?php
                mysqli_data_seek($subCat_result, 0);
                while ($sub = mysqli_fetch_assoc($subCat_result)) {
                    $isActive = ($selected_subcategory === (int)$sub['id']);
                    $subImg = "./admin/uploads/subcategory/" . $sub['id'] . "/" . $sub['sub_cat_img'];
                    if (!file_exists($subImg)) {
                        $subImg = "./assets/images/1.jpg";
                    }
                ?>
                    <div class="col-6 col-sm-4 col-md-3 mb-3">
                        <a href="webproduct.php?category=<?php echo $category_id; ?>&subcategory=<?php echo $sub['id']; ?>" style="text-decoration: none;">
                            <div class="card h-100 text-center shadow-sm" style="border: <?php echo $isActive ? '2px solid #ff6f00' : '1px solid #ffe0b2'; ?>; border-radius: 12px; background: #fffcf8; transition: transform 0.2s;">
                                <div style="height: 120px; display: flex; align-items: center; justify-content: center; padding: 10px;">
                                    <img src="<?php echo $subImg; ?>" 
                                         alt="<?php echo htmlspecialchars($sub['sub_cat_name']); ?>" 
                                         style="max-height: 100px; max-width: 100%; object-fit: contain; border-radius: 8px;">
                                </div>
                                <div class="card-body p-2">
                                    <h6 class="card-title mb-0" style="font-size: 14px; font-weight: bold; color: #333;">
                                        <?php echo htmlspecialchars($sub['sub_cat_name']); ?>
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        <?php endif; ?>

        <!-- Products Section -->
        <div class="products-wrapper my-4">
            <?php
            // Query products
            if ($selected_subcategory > 0) {
                $query = "SELECT * FROM products WHERE category_id='$category_id' AND subcategory_id='$selected_subcategory' ORDER BY id DESC";
            } else {
                $query = "SELECT * FROM products WHERE category_id='$category_id' ORDER BY id DESC";
            }
            $result = mysqli_query($conn, $query);
            $product_count = $result ? mysqli_num_rows($result) : 0;
            ?>

            <?php if ($product_count > 0): ?>
                <div class="product-container">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $imgPath = "./admin/uploads/products/" . $row['id'] . "/" . $row['product_image'];
                        if (!file_exists($imgPath)) {
                            $imgPath = "./assets/images/1.jpg";
                        }
                    ?>
                        <div class="product-card">
                            <a href="product_detail.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: inherit;">
                                <img src="<?php echo $imgPath; ?>" alt="<?php echo htmlspecialchars($row['product_name']); ?>">
                                <h2 class="product-title"><?php echo htmlspecialchars($row['product_name']); ?></h2>
                            </a>
                            <span class="product-price">Rs <?php echo number_format($row['price'], 2); ?></span><br>
                            <div class="buttons mt-2">
                                <button class="cart-btn" onclick="addToCart(<?php echo $user_id; ?>, <?php echo $row['id']; ?>)">Add to Cart</button>
                                <button class="wishlist-btn" onclick="addToWishlist(<?php echo $user_id; ?>, <?php echo $row['id']; ?>)">Add to Wishlist</button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                    <h4>No products available in this selection yet.</h4>
                    <p class="text-muted">Explore all our farm-fresh authentic Konkan items!</p>
                    <a href="webproduct.php?category=<?php echo $category_id; ?>" class="btn btn-warning text-white rounded-pill px-4 mt-2">View All <?php echo htmlspecialchars($category_name); ?></a>
                </div>
            <?php endif; ?>
        </div>

    </div>
</main>

<?php include('footer.php'); ?>
