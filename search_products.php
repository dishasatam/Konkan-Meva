<?php
include('connection.php');

$q = $_GET['q'] ?? '';

$data = [];

if ($q !== '') {
    $query = "SELECT id, product_name FROM products WHERE product_name LIKE '%$q%' LIMIT 10";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($data);
