<?php include('header.php'); ?>
<?php include('connection.php'); ?>

<!-- Main Content -->
<div class="content pt-5">
    <div class="container-fluid mt-4">
        <h4 class="mb-4">Admin Dashboard</h4>

        <!-- Summary Cards -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card text-bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Total Products</h5>
                        <p class="card-text fs-4">
                            <?php
                            $res = mysqli_query($conn, "SELECT COUNT(*) as total FROM products");
                            $row = mysqli_fetch_assoc($res);
                            echo $row['total'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text fs-4">
                            <?php
                            $res = mysqli_query($conn, "SELECT COUNT(*) as total FROM orders");
                            $row = mysqli_fetch_assoc($res);
                            echo $row['total'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text fs-4">
                            <?php
                            $res = mysqli_query($conn, "SELECT COUNT(*) as total FROM user_registration");
                            $row = mysqli_fetch_assoc($res);
                            echo $row['total'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">Total Sales</h5>
                        <p class="card-text fs-4">
                            ₹
                            <?php
                            $res = mysqli_query($conn, "SELECT SUM(total) as total_sales FROM orders WHERE status='paid'");
                            $row = mysqli_fetch_assoc($res);
                            echo number_format($row['total_sales'] ?? 0, 2);
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-bg-secondary">
                    <div class="card-body">
                        <h5 class="card-title">Pending Orders</h5>
                        <p class="card-text fs-4">
                            <?php
                            $res = mysqli_query($conn, "SELECT COUNT(*) as total FROM orders WHERE status='cod'");
                            $row = mysqli_fetch_assoc($res);
                            echo $row['total'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Delivered Orders</h5>
                        <p class="card-text fs-4">
                            <?php
                            $res = mysqli_query($conn, "SELECT COUNT(*) as total FROM orders WHERE status='delivered'");
                            $row = mysqli_fetch_assoc($res);
                            echo $row['total'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="mt-5">
            <h5 class="fw-bold">Recent Orders</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-hover mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>Order ID</th>
                            <th>Name</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $orders = mysqli_query($conn, "SELECT * FROM orders ORDER BY created_at DESC LIMIT 5");
                        while ($row = mysqli_fetch_assoc($orders)) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['fullname']}</td>
                                    <td>₹" . number_format($row['total'], 2) . "</td>
                                    <td>" . strtoupper($row['payment_method']) . "</td>
                                    <td>" . ucfirst($row['status']) . "</td>
                                    <td>" . date("d-m-Y h:i A", strtotime($row['created_at'])) . "</td>
                                  </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
