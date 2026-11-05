<?php
include('connection.php');
include('header.php');

// Filter and Sort Setup
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sort = $_GET['sort'] ?? 'date_desc';

$sort_column = 'created_at';
$sort_order = 'DESC';

if ($sort === 'date_asc') {
    $sort_order = 'ASC';
} elseif ($sort === 'total_asc') {
    $sort_column = 'total';
    $sort_order = 'ASC';
} elseif ($sort === 'total_desc') {
    $sort_column = 'total';
    $sort_order = 'DESC';
} elseif ($sort === 'name_asc') {
    $sort_column = 'fullname';
    $sort_order = 'ASC';
} elseif ($sort === 'name_desc') {
    $sort_column = 'fullname';
    $sort_order = 'DESC';
}

// Pagination Setup
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Count total orders
$count_sql = "SELECT COUNT(*) AS total FROM orders 
              WHERE fullname LIKE '%$search%' OR mobile LIKE '%$search%' OR payment_method LIKE '%$search%'";
$count_result = mysqli_query($conn, $count_sql);
$total_rows = mysqli_fetch_assoc($count_result)['total'];
$total_pages = ceil($total_rows / $limit);

// Fetch Orders
$sql = "SELECT * FROM orders 
        WHERE fullname LIKE '%$search%' OR mobile LIKE '%$search%' OR payment_method LIKE '%$search%'
        ORDER BY $sort_column $sort_order 
        LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);
?>

<div class="content pt-5">
    <div class="container mt-4">
        <h4>All Orders</h4>

        <!-- Filter & Sort -->
        <form class="row mb-3" method="GET">
            <div class="col-md-4">
                <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" class="form-control" placeholder="Search name, mobile or payment...">
            </div>
            <div class="col-md-4">
                <select name="sort" class="form-select" onchange="this.form.submit()">
                    <option value="date_desc" <?= $sort == 'date_desc' ? 'selected' : '' ?>>Newest First</option>
                    <option value="date_asc" <?= $sort == 'date_asc' ? 'selected' : '' ?>>Oldest First</option>
                    <option value="total_asc" <?= $sort == 'total_asc' ? 'selected' : '' ?>>Total Low to High</option>
                    <option value="total_desc" <?= $sort == 'total_desc' ? 'selected' : '' ?>>Total High to Low</option>
                    <option value="name_asc" <?= $sort == 'name_asc' ? 'selected' : '' ?>>Name A-Z</option>
                    <option value="name_desc" <?= $sort == 'name_desc' ? 'selected' : '' ?>>Name Z-A</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-dark">Filter</button>
                <a href="ordersList.php" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <!-- Order Table -->
        <div class="table-responsive">

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Placed On</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['fullname'] ?></td>
                            <td><?= $row['mobile'] ?></td>
                            <td>₹<?= number_format($row['total'], 2) ?></td>
                            <td><?= strtoupper($row['payment_method']) ?></td>
                            <td><?= ucfirst($row['status']) ?></td>
                            <td><?= date('d-m-Y h:i A', strtotime($row['created_at'])) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="7" class="text-center">No orders found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        </div>

        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                        <a class="page-link" href="?search=<?= urlencode($search) ?>&sort=<?= $sort ?>&page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</div>

<?php include('footer.php'); ?>
