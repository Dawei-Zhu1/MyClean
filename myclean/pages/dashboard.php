<?php
session_start();
require_once __DIR__ . '/../includes/Database.php';
require_once __DIR__ . '/../includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php $section_name = "Dashboard";
$stylesheets = ['/assets/stylesheets/dashboard.css'];
require_once __DIR__ . '/../includes/head.php'
?>
<body>
<?php require_once __DIR__ . '/../includes/navbar.php' ?>
<div class="container">
    <!--If not logged in-->
    <?php if (!(isset($_SESSION['is_login']) and $_SESSION['is_login'])) { ?>
        <?php header('location: /pages/auth/login.php'); ?>

    <?php } else { ?>
        <!-- Sidebar -->
        <div class="sidebar border-end">
            <h5 class="text-center mb-4">Account Settings</h5>
            <ul class="nav flex-column px-3">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Security</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Notifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Payment Methods</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Subscription</a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link text-danger" href="/pages/auth/logout.php">Logout</a>
                </li>
            </ul>
        </div>

        <!-- Main content -->
        <div class="main-content">
            <h2>Welcome to MyClean</h2>
            <p>Use the sidebar to manage your account settings.</p>

            <!-- Example content section -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile Information</h5>
                    <p class="card-text">Name: Jane Doe<br>Email: jane@example.com</p>
                    <a href="#" class="btn btn-outline-primary">Edit Profile</a>
                </div>
            </div>
        </div>

    <?php } ?>
</div>
</body>
</html>
