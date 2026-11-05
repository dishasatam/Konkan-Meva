<?php
include('connection.php');
include('header.php');

// Pagination setup
$limit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Filter and sort
$where = "";
$sort = "p.id DESC";

if (!empty($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $where .= " AND (p.product_name LIKE '%$search%' OR c.category_name LIKE '%$search%')";
}

if (!empty($_GET['sort'])) {
    $sortOption = $_GET['sort'];
    switch ($sortOption) {
        case 'price_asc': $sort = "p.price ASC"; break;
        case 'price_desc': $sort = "p.price DESC"; break;
        case 'name_asc': $sort = "p.product_name ASC"; break;
        case 'name_desc': $sort = "p.product_name DESC"; break;
    }
}

$query = "SELECT p.*, c.category_name FROM products p JOIN category_master c ON p.category_id = c.id WHERE 1 $where ORDER BY $sort LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);

$total_query = "SELECT COUNT(*) AS total FROM products p JOIN category_master c ON p.category_id = c.id WHERE 1 $where";
$total_result = mysqli_fetch_assoc(mysqli_query($conn, $total_query));
$total_rows = $total_result['total'];
$total_pages = ceil($total_rows / $limit);
?>

<main>
<div class="content pt-5">
    <div class="container-fluid mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Product List</h4>
            <a href="productAdd.php" class="btn btn-primary">+ Add New Product</a>
        </div>

        <form method="GET" class="row g-3 mb-3">
            <div class="col-md-4">
                <input type="text" name="search" value="<?= $_GET['search'] ?? '' ?>" class="form-control" placeholder="Search products or categories">
            </div>
            <div class="col-md-4">
                <select name="sort" class="form-select">
                    <option value="">Sort By</option>
                    <option value="price_asc" <?= ($_GET['sort'] ?? '') === 'price_asc' ? 'selected' : '' ?>>Price Low to High</option>
                    <option value="price_desc" <?= ($_GET['sort'] ?? '') === 'price_desc' ? 'selected' : '' ?>>Price High to Low</option>
                    <option value="name_asc" <?= ($_GET['sort'] ?? '') === 'name_asc' ? 'selected' : '' ?>>Name A-Z</option>
                    <option value="name_desc" <?= ($_GET['sort'] ?? '') === 'name_desc' ? 'selected' : '' ?>>Name Z-A</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-dark">Apply</button>
            </div>
        </form>

        <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><img src="uploads/products/<?= $row['id'] ?>/<?= $row['product_image'] ?>" width="50"></td>
                        <td><?= $row['product_name'] ?></td>
                        <td><?= $row['category_name'] ?></td>
                        <td>₹<?= $row['price'] ?></td>
                        <td><?= $row['qty'] ?></td>
                        <td>
                            <a href="productEdit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="productDeleteBackend.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        </div>

        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>&search=<?= $_GET['search'] ?? '' ?>&sort=<?= $_GET['sort'] ?? '' ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>

    </div>
</div>
</main>

<?php include('footer.php'); ?>
