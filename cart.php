<?php
include('connection.php');
include('header.php');

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
?>

<main class="py-5">
    <div class="container">
        <h2 class="mb-4">Your Cart</h2>

        <?php if (!$user_id): ?>
            <div class="alert alert-warning">
                You are not logged in. Please log in to view your cart.
            </div>
            <button class="btn btn-warning openLoginModal">Login to View Cart</button>

        <?php else: ?>
            <?php
            $cart_query = "SELECT c.id as cart_id, c.qty, p.product_name, p.price, p.product_image, p.id as product_id
                           FROM cart c
                           JOIN products p ON c.product_id = p.id
                           WHERE c.user_id = '$user_id'";
            $result = mysqli_query($conn, $cart_query);

            if (mysqli_num_rows($result) > 0):
            ?>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price (₹)</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_price = 0;
                            while ($row = mysqli_fetch_assoc($result)):
                                $subtotal = $row['price'] * $row['qty'];
                                $total_price += $subtotal;
                            ?>
                            <tr>
                                <td>
                                    <img src="./admin/uploads/products/<?= $row['product_id']; ?>/<?= $row['product_image']; ?>" width="70" class="img-thumbnail">
                                </td>
                                <td><?= htmlspecialchars($row['product_name']) ?></td>
                                <td>₹<?= number_format($row['price'], 2) ?></td>
                                <td>
                                    <form action="update_cart.php" method="post" class="d-flex justify-content-center align-items-center gap-2">
                                        <input type="hidden" name="cart_id" value="<?= $row['cart_id']; ?>">
                                        <input type="number" name="qty" value="<?= $row['qty']; ?>" min="1" class="form-control form-control-sm" style="width: 70px;">
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
                                    </form>
                                </td>
                                <td>₹<?= number_format($subtotal, 2) ?></td>
                                <td>
                                    <form action="remove_cart.php" method="post" onsubmit="return confirm('Remove this item?');">
                                        <input type="hidden" name="cart_id" value="<?= $row['cart_id']; ?>">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endwhile; ?>

                            <tr>
                                <td colspan="4" class="text-end fw-bold">Total:</td>
                                <td colspan="2" class="fw-bold text-success fs-5">₹<?= number_format($total_price, 2) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-end">
                    <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
                </div>
            <?php else: ?>
                <div class="alert alert-info">Your cart is currently empty.</div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</main>

<?php include('footer.php'); ?>
