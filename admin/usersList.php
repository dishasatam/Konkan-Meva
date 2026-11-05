<?php
include('connection.php');
include('header.php');

// Filter and Sort Setup
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id_desc';

$sort_column = 'id';
$sort_order = 'DESC';

if ($sort === 'name_asc') {
    $sort_column = 'first_name';
    $sort_order = 'ASC';
} elseif ($sort === 'name_desc') {
    $sort_column = 'first_name';
    $sort_order = 'DESC';
} elseif ($sort === 'email_asc') {
    $sort_column = 'email';
    $sort_order = 'ASC';
}

// Pagination setup
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Count total
$count_sql = "SELECT COUNT(*) AS total FROM user_registration 
              WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR email LIKE '%$search%'";
$count_result = mysqli_query($conn, $count_sql);
$total_rows = mysqli_fetch_assoc($count_result)['total'];
$total_pages = ceil($total_rows / $limit);

// Fetch data
$sql = "SELECT * FROM user_registration 
        WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR email LIKE '%$search%'
        ORDER BY $sort_column $sort_order
        LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);
?>

<div class="content pt-5">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>User List</h4>
        </div>

        <!-- Filter & Sort -->
        <form class="row mb-3" method="GET">
            <div class="col-md-4">
                <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" class="form-control" placeholder="Search user by name or email...">
            </div>
            <div class="col-md-4">
                <select name="sort" class="form-select" onchange="this.form.submit()">
                    <option value="id_desc" <?= $sort == 'id_desc' ? 'selected' : '' ?>>Newest First</option>
                    <option value="name_asc" <?= $sort == 'name_asc' ? 'selected' : '' ?>>Name A-Z</option>
                    <option value="name_desc" <?= $sort == 'name_desc' ? 'selected' : '' ?>>Name Z-A</option>
                    <option value="email_asc" <?= $sort == 'email_asc' ? 'selected' : '' ?>>Email A-Z</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-dark">Filter</button>
                <a href="userList.php" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <!-- User Table -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['first_name'] . ' ' . $row['last_name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['gender'] ?></td>
                            <td><?= $row['country'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="text-center">No users found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

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
