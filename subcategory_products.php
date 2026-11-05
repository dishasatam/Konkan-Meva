<?php
include('header.php');
include('connection.php');
include('category_list.php');

// Ensure subcategory_id is provided and valid
$subcategory_id = isset($_GET['subcategory_id']) ? (int)$_GET['subcategory_id'] : 0;

if ($subcategory_id <= 0) {
    echo "<script>alert('Invalid subcategory.'); window.location.href='index.php';</script>";
    exit;
}

// Fetch subcategory and parent category details
$subcat_res = mysqli_query($conn, "SELECT s.*, c.category_name, c.id as cat_id FROM sub_category s JOIN category_master c ON s.category_id = c.id WHERE s.id='$subcategory_id'");
if ($subcat_res && mysqli_num_rows($subcat_res) > 0) {
    $subcat = mysqli_fetch_assoc($subcat_res);
    $parent_cat_id = $subcat['cat_id'];
    $parent_cat_name = $subcat['category_name'];
    $sub_name = $subcat['sub_cat_name'];
} else {
    echo "<script>alert('Subcategory not found.'); window.location.href='index.php';</script>";
    exit;
}
?>

<main>
    <div style="width: 100%; height: 4px; background: linear-gradient(90deg, #ff6f00, #ffa726, #ff6f00); margin: 0 0 25px 0;"></div>
    <div class="contain">

        <div class="text-center my-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center bg-transparent p-0 mb-2">
                    <li class="breadcrumb-item"><a href="index.php" class="text-warning">Home</a></li>
                    <li class="breadcrumb-item"><a href="webproduct.php?category=<?php echo $parent_cat_id; ?>" class="text-warning"><?php echo htmlspecialchars($parent_cat_name); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($sub_name); ?></li>
                </ol>
            </nav>
            <h2 class="section-heading" style="color: #ff6f00; font-weight: bold; font-size: 28px;">
                <?php echo htmlspecialchars($sub_name); ?>
            </h2>
            <p class="text-muted">Fresh regional varieties from Konkan farms</p>
        </div>

        <!-- Sibling Subcategories Navigation Pills -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
            <a href="webproduct.php?category=<?php echo $parent_cat_id; ?>" class="btn btn-outline-warning text-dark rounded-pill px-3 py-2 m-1">
                🌟 All <?php echo htmlspecialchars($parent_cat_name); ?>
            </a>
            <?php
            $sibling_query = "SELECT * FROM sub_category WHERE category_id='$parent_cat_id'";
            $sibling_res = mysqli_query($conn, $sibling_query);
            while ($sib = mysqli_fetch_assoc($sibling_res)) {
                $isCurrent = ((int)$sib['id'] === $subcategory_id);
            ?>
                <a href="subcategory_products.php?subcategory_id=<?php echo $sib['id']; ?>" 
                   class="btn <?php echo $isCurrent ? 'btn-warning text-white' : 'btn-outline-warning text-dark'; ?> rounded-pill px-3 py-2 m-1 font-weight-bold">
                    <?php echo htmlspecialchars($sib['sub_cat_name']); ?>
                </a>
            <?php } ?>
        </div>

        <div class="product-container">
            <?php
            // Fetch products for this subcategory
            $query = "SELECT * FROM products WHERE subcategory_id='$subcategory_id' ORDER BY id DESC";
            $result = mysqli_query($conn, $query);
            $count = $result ? mysqli_num_rows($result) : 0;

            if ($count > 0) {
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
            <?php 
                }
            } else {
            ?>
                <div class="text-center py-5 w-100">
                    <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                    <h4>No products available in this subcategory yet.</h4>
                    <p class="text-muted">Explore more farm fresh delicacies in Konkan Fruits.</p>
                    <a href="webproduct.php?category=<?php echo $parent_cat_id; ?>" class="btn btn-warning text-white rounded-pill px-4 mt-2">View All <?php echo htmlspecialchars($parent_cat_name); ?></a>
                </div>
            <?php } ?>
        </div>

    </div>
</main>

<?php include('footer.php'); ?>
