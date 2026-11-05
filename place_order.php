<?php
include('connection.php');
session_start();

$user_id = $_SESSION['user_id'] ?? 0;
if (!$user_id) {
    echo "<script>alert('You must be logged in to place an order.'); window.location.href='login.php';</script>";
    exit;
}

// Get and validate form inputs
$fullname = mysqli_real_escape_string($conn, $_POST['fullname'] ?? '');
$mobile = mysqli_real_escape_string($conn, $_POST['mobile'] ?? '');
$address = mysqli_real_escape_string($conn, $_POST['address'] ?? '');
$payment_method = $_POST['payment_method'] ?? '';

if (empty($fullname) || empty($mobile) || empty($address) || empty($payment_method)) {
    echo "<script>alert('All fields are required.'); window.history.back();</script>";
    exit;
}

// Fetch cart items
$cart_query = "SELECT c.product_id, c.qty, p.price
               FROM cart c
               JOIN products p ON c.product_id = p.id
               WHERE c.user_id = '$user_id'";
$cart_result = mysqli_query($conn, $cart_query);

if (mysqli_num_rows($cart_result) == 0) {
    echo "<script>alert('Your cart is empty.'); window.location.href='cart.php';</script>";
    exit;
}

// Calculate total
$total = 0;
$cart_items = [];
while ($row = mysqli_fetch_assoc($cart_result)) {
    $subtotal = $row['qty'] * $row['price'];
    $total += $subtotal;
    $cart_items[] = $row;
}

// Dummy payment simulation
if ($payment_method == 'online') {
    // Dummy delay
    sleep(2); // simulate processing
    $payment_status = 'paid'; // simulate successful payment
} else {
    $payment_status = 'cod';
}

// Insert order
$order_sql = "INSERT INTO orders (user_id, fullname, mobile, address, total, payment_method, status, created_at)
              VALUES ('$user_id', '$fullname', '$mobile', '$address', '$total', '$payment_method', '$payment_status', NOW())";
if (mysqli_query($conn, $order_sql)) {
    $order_id = mysqli_insert_id($conn);

    // Insert order items
    foreach ($cart_items as $item) {
        $pid = $item['product_id'];
        $qty = $item['qty'];
        $price = $item['price'];
        mysqli_query($conn, "INSERT INTO order_items (order_id, product_id, qty, price) 
                             VALUES ('$order_id', '$pid', '$qty', '$price')");
    }

    // Clear user's cart
    mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'");

    echo "<script>alert('Order placed successfully!'); window.location.href='my_orders.php';</script>";
} else {
    echo "<script>alert('Failed to place order. Please try again.'); window.history.back();</script>";
}
?>
