<?php
session_start();
$username = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : null;

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css" />

    <!-- Swiper JS (before closing body) -->
    <script src="./assets/js/swiper-bundle.min.js"></script>


    <!-- FontAwesome 5.15.4 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>कोकण मेवा</title>

    <style>
        .navbar-custom {
            background-color: #ff6f00;
            /* Orange */
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand,
        .navbar-custom .dropdown-item {
            color: white !important;
        }

        .navbar-custom .nav-link:hover,
        .navbar-custom .dropdown-item:hover {
            color: #ffe0b2 !important;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none !important;
            padding: 0;
            margin-right: 25px;
        }

        .navbar-brand img {
            height: 60px;
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
        }

        .navbar-brand .brand-name-bold {
            font-size: 26px;
            font-weight: 900;
            color: #ffffff !important;
            margin-left: 12px;
            letter-spacing: 1px;
            text-shadow: 1px 2px 4px rgba(0, 0, 0, 0.35);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .header-orange-divider {
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #d84315, #ff6f00, #ffca28, #ff6f00, #d84315);
            box-shadow: 0 2px 6px rgba(230, 81, 0, 0.4);
        }

        .dropdown-menu a {
            color: #333 !important;
        }

        #search-results {
            max-height: 200px;
            overflow-y: auto;
            top: 35px;
        }

        #search-results li {
            cursor: pointer;
            padding: 10px;
        }

        #search-results li:hover {
            background-color: #ffe0b2;
        }

        .navbar-custom .dropdown-item,
        .dropdown-item {
            color: #333 !important;
            font-size: 18px;
        }

        .nav-link {
            font-size: 20px;
        }

        .dropdown-menu {
            scrollbar-width: thin;
            scrollbar-color: #ffa726 #fff;
            /* Orange + white */
        }

        .dropdown-menu::-webkit-scrollbar {
            width: 6px;
        }

        .dropdown-menu::-webkit-scrollbar-thumb {
            background-color: #ffa726;
            border-radius: 10px;
        }
    </style>

</head>

<body>

    <!-- NAVBAR  -->

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="./assets/images/kokan-mewa-logo-120x120.png" alt="Konkan Meva Logo">
                <span class="brand-name-bold">कोकण मेवा</span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars" style="color:white;"></i>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="max-height: 200px; overflow-y: auto;">
                            <?php
                            include('connection.php');
                            $query = "SELECT * FROM category_master";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<a class="dropdown-item" href="webproduct.php?category=' . $row['id'] . '">' . htmlspecialchars($row['category_name']) . '</a>';
                            }
                            ?>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 position-relative" autocomplete="off">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search products..." aria-label="Search" id="search-box">
                    <ul id="search-results" class="list-group position-absolute w-100 mt-1" style="z-index: 1000;"></ul>
                </form>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="wishlist.php"><i class="fas fa-heart"></i> Wishlist</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            <?php echo isset($username) ? $username : 'Login'; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="loginDropdown">
                            <?php if (isset($username)) { ?>
                                <a class="dropdown-item" href="profile.php">Profile</a>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            <?php } else { ?>
                                <a class="dropdown-item" href="admin/index.php">Admin</a>
                                <a class="dropdown-item openLoginModal" href="javascript:void(0)">Customer</a>
                            <?php } ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="header-orange-divider"></div>

    <!-- 
</body>

</html> -->