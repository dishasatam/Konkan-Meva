<?php
include 'connection.php';
session_start();

$UserName = $_POST['username'];
$Password = $_POST['password'];

$sql = "SELECT * FROM `admin` WHERE username='$UserName' and password='$Password'";

$resultData = mysqli_query($conn, $sql);
$count = mysqli_num_rows($resultData);

if ($count == 1) {
    while ($row = mysqli_fetch_assoc($resultData)) {

        $_SESSION['username'] = $row['username'];
    }
    echo '<script type="text/javascript">';
    echo 'alert("Login succesfully");';
    echo 'window.location.href = "dashboard.php";';
    echo '</script>';
} else {
    //3.2 When the user visits the page first time, simple login form will be displayed.
    echo '<script type="text/javascript">';
    echo 'alert("Login Again!");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
}
