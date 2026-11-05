<?php
include('connection.php');
include('header.php');

$user_id = $_SESSION['user_id'] ?? 0;
if (!$user_id) {
    echo "<script>alert('Please login to proceed to checkout.'); window.location.href='cart.php';</script>";
    exit;
}

// Fetch cart items
$cart_query = "SELECT c.qty, p.product_name, p.price, p.product_image, p.id as product_id
               FROM cart c
               JOIN products p ON c.product_id = p.id
               WHERE c.user_id = '$user_id'";
$cart_result = mysqli_query($conn, $cart_query);
?>

<main class="py-5">
    <div class="container">
        <h2 class="mb-4">Checkout</h2>

        <div class="row">
            <!-- Billing Details -->
            <div class="col-md-6 mb-4">
                <h4>Billing Details</h4>
                <form action="place_order.php" method="POST">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" name="fullname" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile Number</label>
                        <input type="text" name="mobile" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Full Address</label>
                        <textarea name="address" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="payment">Payment Method</label>
                        <select name="payment_method" class="form-control" required>
                            <option value="cod">Cash on Delivery</option>
                            <option value="online">Online Payment (Coming Soon)</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Place Order</button>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="col-md-6">
                <h4>Order Summary</h4>
                <?php
                $total = 0;
                if (mysqli_num_rows($cart_result) > 0):
                ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($item = mysqli_fetch_assoc($cart_result)):
                                $subtotal = $item['price'] * $item['qty'];
                                $total += $subtotal;
                            ?>
                                <tr>
                                    <td><?= htmlspecialchars($item['product_name']); ?></td>
                                    <td><?= $item['qty']; ?></td>
                                    <td>₹<?= number_format($subtotal, 2); ?></td>
                                </tr>
                            <?php endwhile; ?>
                            <tr>
                                <td colspan="2" class="text-end fw-bold">Total:</td>
                                <td class="fw-bold text-success">₹<?= number_format($total, 2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info">Your cart is empty.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php include('footer.php'); ?>