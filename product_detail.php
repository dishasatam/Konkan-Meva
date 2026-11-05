<?php
include('header.php');
include('connection.php');

$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($product_id <= 0) {
    echo "<script>alert('Invalid product ID.'); window.location.href='shop.php';</script>";
    exit;
}

$sql = "SELECT p.*, c.category_name, s.sub_cat_name 
        FROM products p 
        LEFT JOIN category_master c ON p.category_id = c.id 
        LEFT JOIN sub_category s ON p.subcategory_id = s.id 
        WHERE p.id = '$product_id'";
$res = mysqli_query($conn, $sql);

if (!$res || mysqli_num_rows($res) == 0) {
    echo "<script>alert('Product not found.'); window.location.href='shop.php';</script>";
    exit;
}

$product = mysqli_fetch_assoc($res);
$imgPath = "./admin/uploads/products/" . $product['id'] . "/" . $product['product_image'];
if (!file_exists($imgPath)) {
    $imgPath = "./assets/images/1.jpg";
}
?>

<main class="py-5" style="background-color: #fafafa; min-height: 80vh;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-white p-3 rounded shadow-sm">
                <li class="breadcrumb-item"><a href="index.php" class="text-warning">Home</a></li>
                <li class="breadcrumb-item"><a href="shop.php" class="text-warning">Shop</a></li>
                <?php if (!empty($product['category_name'])): ?>
                    <li class="breadcrumb-item">
                        <a href="webproduct.php?category=<?php echo $product['category_id']; ?>" class="text-warning">
                            <?php echo htmlspecialchars($product['category_name']); ?>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($product['product_name']); ?></li>
            </ol>
        </nav>

        <div class="card shadow-sm border-0 p-4 mb-5" style="border-radius: 15px;">
            <div class="row align-items-center">
                <div class="col-md-5 text-center mb-4 mb-md-0">
                    <div style="background: #fff; padding: 20px; border-radius: 12px; border: 1px solid #ffe0b2;">
                        <img src="<?php echo $imgPath; ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>" class="img-fluid" style="max-height: 380px; object-fit: contain;">
                    </div>
                </div>
                <div class="col-md-7">
                    <span class="badge bg-warning text-dark px-3 py-2 mb-2" style="font-size: 14px;">
                        <?php echo htmlspecialchars($product['category_name'] ?? 'Konkan Delicacy'); ?>
                    </span>
                    <?php if (!empty($product['sub_cat_name'])): ?>
                        <span class="badge bg-light text-secondary border px-3 py-2 mb-2" style="font-size: 14px;">
                            <?php echo htmlspecialchars($product['sub_cat_name']); ?>
                        </span>
                    <?php endif; ?>

                    <h1 class="display-6 font-weight-bold mb-3" style="color: #333;">
                        <?php echo htmlspecialchars($product['product_name']); ?>
                    </h1>

                    <h3 class="text-danger font-weight-bold mb-3">
                        Rs <?php echo number_format($product['price'], 2); ?>
                    </h3>

                    <p class="text-muted mb-4" style="font-size: 16px; line-height: 1.7;">
                        <?php 
                        if (!empty($product['description'])) {
                            echo nl2br(htmlspecialchars($product['description']));
                        } else {
                            echo "Authentic farm-fresh specialty from the Konkan coastline. Prepared with traditional methods, free of artificial additives, ensuring authentic aroma and superior regional taste.";
                        }
                        ?>
                    </p>

                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="text-success font-weight-bold">
                            <i class="fas fa-check-circle"></i> In Stock (<?php echo (int)($product['qty'] ?? 50); ?> available)
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-warning btn-lg text-white font-weight-bold px-4 py-2 rounded-pill shadow-sm" onclick="addToCart(<?php echo $user_id; ?>, <?php echo $product['id']; ?>)">
                            <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                        </button>
                        <button class="btn btn-outline-danger btn-lg font-weight-bold px-4 py-2 rounded-pill shadow-sm ml-2" onclick="addToWishlist(<?php echo $user_id; ?>, <?php echo $product['id']; ?>)">
                            <i class="fas fa-heart mr-2"></i> Add to Wishlist
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products Section -->
        <?php
        $catId = (int)$product['category_id'];
        $relSql = "SELECT * FROM products WHERE category_id = '$catId' AND id != '$product_id' LIMIT 4";
        $relRes = mysqli_query($conn, $relSql);
        if ($relRes && mysqli_num_rows($relRes) > 0):
        ?>
            <div class="my-5">
                <h3 class="font-weight-bold mb-4" style="color: #ff6f00;">You May Also Like</h3>
                <div class="product-container">
                    <?php while ($rel = mysqli_fetch_assoc($relRes)): 
                        $relImg = "./admin/uploads/products/" . $rel['id'] . "/" . $rel['product_image'];
                        if (!file_exists($relImg)) {
                            $relImg = "./assets/images/1.jpg";
                        }
                    ?>
                        <div class="product-card">
                            <a href="product_detail.php?id=<?php echo $rel['id']; ?>" style="text-decoration: none; color: inherit;">
                                <img src="<?php echo $relImg; ?>" alt="<?php echo htmlspecialchars($rel['product_name']); ?>">
                                <h2 class="product-title"><?php echo htmlspecialchars($rel['product_name']); ?></h2>
                            </a>
                            <span class="product-price">Rs <?php echo number_format($rel['price'], 2); ?></span><br>
                            <div class="buttons mt-2">
                                <button class="cart-btn" onclick="addToCart(<?php echo $user_id; ?>, <?php echo $rel['id']; ?>)">Add to Cart</button>
                                <button class="wishlist-btn" onclick="addToWishlist(<?php echo $user_id; ?>, <?php echo $rel['id']; ?>)">Add to Wishlist</button>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php include('footer.php'); ?>
