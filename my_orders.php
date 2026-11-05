<?php
include('connection.php');
include('header.php');

$user_id = $_SESSION['user_id'] ?? 0;
if (!$user_id) {
    echo "<script>alert('You must be logged in to view your orders.'); window.location.href='login.php';</script>";
    exit;
}
?>

<main class="py-5">
    <div class="container">
        <h2 class="mb-4">My Orders</h2>

        <?php
        $orders = mysqli_query($conn, "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY created_at DESC");

        if (mysqli_num_rows($orders) > 0):
            while ($order = mysqli_fetch_assoc($orders)):
                $order_id = $order['id'];
                $items = mysqli_query($conn, "
                    SELECT oi.*, p.product_name, p.product_image 
                    FROM order_items oi 
                    JOIN products p ON oi.product_id = p.id 
                    WHERE oi.order_id = '$order_id'
                ");
        ?>
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-dark text-white">
                <strong>Order #<?= $order['id'] ?></strong> — <?= $order['created_at'] ?> — 
                <span class="text-capitalize"><?= $order['payment_method'] ?></span> 
                (<?= strtoupper($order['status']) ?>)
            </div>
            <div class="card-body">
                <?php while ($item = mysqli_fetch_assoc($items)): ?>
                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                        <div class="d-flex align-items-center gap-3">
                            <img src="./admin/uploads/products/<?= $item['product_id']; ?>/<?= $item['product_image']; ?>" width="60" class="img-thumbnail">
                            <div>
                                <h6 class="mb-0"><?= htmlspecialchars($item['product_name']) ?></h6>
                                <small>Qty: <?= $item['qty'] ?> × ₹<?= number_format($item['price'], 2) ?></small>
                            </div>
                        </div>
                        <div class="fw-bold text-success">₹<?= number_format($item['qty'] * $item['price'], 2) ?></div>
                    </div>
                <?php endwhile; ?>
                <div class="text-end mt-3">
                    <strong>Total: ₹<?= number_format($order['total'], 2) ?></strong>
                </div>
            </div>
        </div>
        <?php endwhile; else: ?>
            <div class="alert alert-info">You have not placed any orders yet.</div>
        <?php endif; ?>
    </div>
</main>

<?php include('footer.php'); ?>
