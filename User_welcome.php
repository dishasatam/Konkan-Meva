<?php
// User.php (Welcome Page)
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login_User.php");
    exit();
}

$user_name = $_SESSION['user_name']; // Retrieve the user's name from the session

?>


<link rel="stylesheet" href="./assets/css/style.css">

    <div class="container">
        <div class="content">
            <h3>Hello, <span>Customer</span></h3>
            <h1>Welcome <span> <?php echo $user_name; ?>  ! </span></h1>
            <p>This is a Customer Page</p>
            <a href="Shop_now.php" class="btn"> Shop Now </a>
            <a href="logout.php" class="btn"> Logout </a>
        </div>
    </div>
