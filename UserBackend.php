<?php
include 'connection.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$city = $_POST['city'];
$region = $_POST['region'];
$postal = $_POST['postal'];
$country = $_POST['country'];


$data = array(
    "first_name" => "'" . $first_name . "'",
    "last_name" => "'" . $last_name . "'",
    "email" => "'" . $email . "'",
    "password" => "'" . $password . "'",
    "phone" => "'" . $phone . "'",
    "birthdate" => "'" . $birthdate . "'",
    "gender" => "'" . $gender . "'",
    "address" => "'" . $address . "'",
    "city" => "'" . $city . "'",
    "region" => "'" . $region . "'",
    "postal" => "'" . $postal . "'",
    "country" => "'" . $country . "'",
);


$columns = implode(',', array_keys($data));
$values = implode(',', array_values($data));

$sql = "INSERT INTO `user_registration` ($columns) VALUES ($values)";


if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">';
    echo 'alert("Register Successfully!");';
    echo 'window.location.href = "index.php"';
    echo '</script>';
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Error Occured! You are not register!");';
    echo 'window.location.href = "register.php"';
    echo '</script>';
}
