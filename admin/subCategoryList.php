<?php include('header.php'); ?>
<?php include('connection.php'); ?>
<main>
    <div class="content pt-5">
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Sub Category List</h4>
                <a href="addSubCategory.php" class="btn btn-primary">+ Add Sub Category</a>
            </div>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Sub Category Name</th>
                        <th>Parent Category</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT s.*, c.category_name 
                            FROM sub_category s
                            JOIN category_master c ON s.category_id = c.id
                            ORDER BY s.id DESC";
                    $result = mysqli_query($conn, $sql);
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $imagePath = "uploads/subcategory/" . $row['id'] . "/" . $row['sub_cat_img'];
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo htmlspecialchars($row['sub_cat_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['category_name']); ?></td>
                            <td>
                                <?php if (!empty($row['sub_cat_img']) && file_exists($imagePath)) { ?>
                                    <img src="<?php echo $imagePath; ?>" width="60" height="60" style="object-fit: cover;">
                                <?php } else {
                                    echo "No image";
                                } ?>
                            </td>
                            <td>
                                <a href="editSubCategory.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="deleteSubCategory.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this subcategory?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include('footer.php'); ?>
