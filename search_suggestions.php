<?php
include('connection.php');
$query = $_POST['query'];
$result = mysqli_query($conn, "SELECT product_name FROM products WHERE product_name LIKE '%$query%' LIMIT 10");

while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>" . htmlspecialchars($row['product_name']) . "</li>";
}
?>
