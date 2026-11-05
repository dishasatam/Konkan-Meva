<?php
include 'connection.php';
session_start();

$Email = $_POST['email'];
$Password = $_POST['password'];

$sql = "SELECT * FROM `user_registration` WHERE email='$Email' and password='$Password'";

$resultData = mysqli_query($conn, $sql);
$count = mysqli_num_rows($resultData);

if ($count == 1) {
    while ($row = mysqli_fetch_assoc($resultData)) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['first_name'] = $row['first_name'];
    }
    // Redirect to the previous page or homepage with a success message
    $_SESSION['message'] = 'Login successful';
    if (isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: /');
    }
    exit; // Make sure to stop the script after the redirect
} else {
    // Redirect to the login page with an error message
    $_SESSION['message'] = 'Login failed. Please try again.';
    header('Location: index.php');
    exit;
}
