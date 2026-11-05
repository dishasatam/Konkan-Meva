<?php
include('connection.php');
include('header.php');

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

$query = "
    SELECT 
        w.id AS wishlist_id,
        p.id As pid,
        p.product_name,
        p.price,
        p.product_image
    FROM wishlist w
    JOIN products p ON w.product_id = p.id
    WHERE w.user_id = '$user_id'
";

$result = mysqli_query($conn, $query);
?>

<main class="py-5">
    <div class="container">
        <h2 class="mb-4">My Wishlist</h2>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td>
                                    <img src="./admin/uploads/products/<?= $row['pid']; ?>/<?= $row['product_image'] ?>" width="80" class="img-thumbnail" alt="<?= $row['product_name'] ?>">
                                </td>
                                <td><?= htmlspecialchars($row['product_name']) ?></td>
                                <td><strong>₹<?= number_format($row['price'], 2) ?></strong></td>
                                <td>
                                    <form action="remove_wishlist.php" method="POST" onsubmit="return confirm('Are you sure?');">
                                        <input type="hidden" name="wishlist_id" value="<?= $row['wishlist_id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info" role="alert">
                Your wishlist is empty.
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include('footer.php'); ?>
