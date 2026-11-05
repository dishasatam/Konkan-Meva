<?php
include('connection.php');
include('header.php');

$user_id = $_SESSION['user_id'] ?? 0;
if (!$user_id) {
    echo "<script>alert('Please login to edit profile.'); window.location.href='login.php';</script>";
    exit;
}

$user_query = mysqli_query($conn, "SELECT * FROM user_registration WHERE id = '$user_id'");
$user = mysqli_fetch_assoc($user_query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $postal = mysqli_real_escape_string($conn, $_POST['postal']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);

    $update = mysqli_query($conn, "UPDATE user_registration SET 
        first_name = '$first_name', 
        last_name = '$last_name', 
        phone = '$phone', 
        gender = '$gender', 
        birthdate = '$birthdate', 
        address = '$address', 
        city = '$city', 
        region = '$region', 
        postal = '$postal', 
        country = '$country' 
        WHERE id = '$user_id'
    ");

    if ($update) {
        echo "<script>alert('Profile updated successfully!'); window.location.href='profile.php';</script>";
        exit;
    } else {
        echo "<div class='alert alert-danger'>Failed to update profile.</div>";
    }
}
?>

<main class="py-5">
    <div class="container">
        <h2 class="mb-4">Edit Profile</h2>

        <form method="post" class="card p-4 shadow-sm">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>First Name</label>
                    <input type="text" name="first_name" value="<?= htmlspecialchars($user['first_name']) ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Last Name</label>
                    <input type="text" name="last_name" value="<?= htmlspecialchars($user['last_name']) ?>" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label>Mobile</label>
                <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" class="form-control" required>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="Male" <?= $user['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= $user['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
                        <option value="Other" <?= $user['gender'] === 'Other' ? 'selected' : '' ?>>Other</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Date of Birth</label>
                    <input type="date" name="birthdate" value="<?= $user['birthdate'] ?>" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control" rows="2"><?= htmlspecialchars($user['address']) ?></textarea>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label>City</label>
                    <input type="text" name="city" value="<?= htmlspecialchars($user['city']) ?>" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Region</label>
                    <input type="text" name="region" value="<?= htmlspecialchars($user['region']) ?>" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Postal Code</label>
                    <input type="text" name="postal" value="<?= htmlspecialchars($user['postal']) ?>" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label>Country</label>
                <input type="text" name="country" value="<?= htmlspecialchars($user['country']) ?>" class="form-control">
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">Update Profile</button>
                <a href="profile.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</main>

<?php include('footer.php'); ?>
