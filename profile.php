<?php
include('connection.php');
include('header.php');

$user_id = $_SESSION['user_id'] ?? 0;
if (!$user_id) {
    echo "<script>alert('Please login to view profile.'); window.location.href='login.php';</script>";
    exit;
}

$user_query = mysqli_query($conn, "SELECT * FROM user_registration WHERE id = '$user_id'");
$user = mysqli_fetch_assoc($user_query);
?>

<main class="py-5">
    <div class="container">
        <h2 class="mb-4">My Profile</h2>

        <div class="card p-4 shadow-sm">
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Full Name:</div>
                <div class="col-md-8"><?= htmlspecialchars($user['first_name'] . " " . $user['last_name']) ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Email:</div>
                <div class="col-md-8"><?= htmlspecialchars($user['email']) ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Mobile:</div>
                <div class="col-md-8"><?= htmlspecialchars($user['phone']) ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Gander:</div>
                <div class="col-md-8"><?= $user['gender'] ?></div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Date of birth:</div>
                <div class="col-md-8"><?= $user['birthdate'] ?></div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Address:</div>
                <div class="col-md-8"><?= $user['address'] . ", " . $user['city'] . ", " . $user['region'] . "-" . $user['postal'] . ", " . $user['country'] ?></div>
            </div>

            <div class="text-end mt-4">
                <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
            </div>


        </div>
    </div>
</main>

<?php include('footer.php'); ?>