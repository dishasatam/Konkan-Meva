<?php
include('connection.php');
include('header.php');

// Handle search and sorting
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id_desc';

$sort_column = 'id';
$sort_order = 'DESC';

if ($sort === 'name_asc') {
    $sort_column = 'category_name';
    $sort_order = 'ASC';
} elseif ($sort === 'name_desc') {
    $sort_column = 'category_name';
    $sort_order = 'DESC';
}

// Pagination variables
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Count total
$count_sql = "SELECT COUNT(*) as total FROM category_master WHERE category_name LIKE '%$search%'";
$count_result = mysqli_query($conn, $count_sql);
$total_rows = mysqli_fetch_assoc($count_result)['total'];
$total_pages = ceil($total_rows / $limit);

// Final query
$query = "SELECT * FROM category_master 
          WHERE category_name LIKE '%$search%' 
          ORDER BY $sort_column $sort_order 
          LIMIT $offset, $limit";
$result = mysqli_query($conn, $query);
?>

<div class="content pt-5">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Category List</h4>
            <a href="categoryAdd.php" class="btn btn-primary">+ Add New Category</a>
        </div>

        <!-- Filter & Sort -->
        <form class="row mb-3" method="GET">
            <div class="col-md-4">
                <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" class="form-control" placeholder="Search Category...">
            </div>
            <div class="col-md-4">
                <select name="sort" class="form-select" onchange="this.form.submit()">
                    <option value="id_desc" <?= $sort == 'id_desc' ? 'selected' : '' ?>>Newest First</option>
                    <option value="name_asc" <?= $sort == 'name_asc' ? 'selected' : '' ?>>Name A-Z</option>
                    <option value="name_desc" <?= $sort == 'name_desc' ? 'selected' : '' ?>>Name Z-A</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-dark">Filter</button>
                <a href="categoryList.php" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><img src="./uploads/category/<?= $row['id'] ?>/<?= $row['category_image'] ?>" width="50"></td>
                            <td><?= $row['category_name'] ?></td>
                            <td>
                                <a href="categoryEdit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="categoryDeleteBackend.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="4" class="text-center">No categories found.</td></tr>
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
