<?php
include('header.php');
include('connection.php');
?>

<main>


<!-- <div style="position: relative; width: 300px; margin: 20px auto;">
    <input type="text" id="search-box" placeholder="Search products..." autocomplete="off" style="width: 100%; padding: 10px;">
    <ul id="search-results"></ul>
</div> -->
    <div style="width: 100%; height: 4px; background: linear-gradient(90deg, #ff6f00, #ffa726, #ff6f00); margin: 0 0 25px 0;"></div>
    <div class="contain">

        <h3 class="section-heading">All Products</h3>

        <div class="product-container">
            <?php
            // Set pagination limit
            $limit = 15;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            if ($page < 1) $page = 1;
            $offset = ($page - 1) * $limit;

            // Get total count
            $count_result = mysqli_query($conn, "SELECT COUNT(*) as total FROM products");
            $count_row = mysqli_fetch_assoc($count_result);
            $total_products = $count_row['total'];
            $total_pages = ceil($total_products / $limit);

            // Fetch paginated products
            $query = "SELECT * FROM products ORDER BY id DESC LIMIT $limit OFFSET $offset";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="product-card">
                    <img src="./admin/uploads/products/<?php echo $row['id']; ?>/<?php echo $row['product_image']; ?>">
                    <h2 class="product-title"><?php echo htmlspecialchars($row['product_name']); ?></h2>
                    <span class="product-price">Rs <?php echo number_format($row['price'], 2); ?></span><br>
                    <div class="buttons">
                        <button class="cart-btn" onclick="addToCart(<?php echo $user_id; ?>,<?php echo $row['id'] ?>)">Add to Cart</button>
                        <button class="wishlist-btn" onclick="addToWishlist(<?php echo $user_id; ?>,<?php echo $row['id'] ?>)">Add to Wishlist</button>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Pagination -->
        <?php if ($total_pages > 1): ?>
            <div style="text-align:center; margin-top:20px;">
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>" class="pagination-link">Prev</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="?page=<?php echo $i; ?>" class="pagination-link <?php echo ($i == $page) ? 'active' : ''; ?>"><?php echo $i; ?></a>
                <?php endfor; ?>

                <?php if ($page < $total_pages): ?>
                    <a href="?page=<?php echo $page + 1; ?>" class="pagination-link">Next</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include('footer.php'); ?>
