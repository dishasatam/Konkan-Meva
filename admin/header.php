<?php
include('connection.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        .sidebar {
            background: linear-gradient(180deg, #ff6f00, #ff6f00);
            color: white;
            height: 100vh;
            position: fixed;
            width: 240px;
            top: 0;
            left: 0;
            padding-top: 60px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link {
            color: #f8f9fa;
            font-size: 16px;
            padding: 12px 20px;
            transition: all 0.2s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #fff;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .topbar {
            position: fixed;
            top: 0;
            left: 240px;
            right: 0;
            background-color: white;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 999;
            transition: left 0.3s ease;
        }

        .sidebar-collapsed .sidebar {
            left: -240px;
        }

        .sidebar-collapsed .content {
            margin-left: 0;
        }

        .sidebar-collapsed .topbar {
            left: 0;
        }

        @media (max-width: 768px) {
            .sidebar {
                left: -240px;
                z-index: 1000;
            }

            .sidebar.show {
                left: 0;
            }

            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }

            .overlay.show {
                display: block;
            }

            .content,
            .topbar {
                margin-left: 0 !important;
                left: 0 !important;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <h4 class="text-center fw-bold">Admin Panel</h4>
        <nav class="nav flex-column mt-4">
            <a href="dashboard.php" class="nav-link active"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
            <a href="productList.php" class="nav-link"><i class="bi bi-box-seam me-2"></i> Products</a>
            <a href="categoryList.php" class="nav-link"><i class="bi bi-box-seam me-2"></i> Catgoery</a>
            <a href="subCategoryList.php" class="nav-link"><i class="bi bi-box-seam me-2"></i> Sub Category</a>
            <a href="ordersList.php" class="nav-link"><i class="bi bi-bag-check me-2"></i> Orders</a>
            <a href="usersList.php" class="nav-link"><i class="bi bi-people me-2"></i> Users</a>
            <a href="logout.php" class="nav-link"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
        </nav>
    </div>

    <!-- Overlay for small screens -->
    <div class="overlay" id="sidebarOverlay"></div>



    <!-- Topbar -->
    <div class="topbar d-flex align-items-center justify-content-between">
        <button class="btn btn-outline-primary d-md-none" id="toggleSidebar"><i class="bi bi-list"></i></button>
        <h5 class="mb-0 fw-semibold">Welcome Admin</h5>
    </div>