<?php
session_start();
include_once __DIR__ . '/includes/config.php';
include_once __DIR__ . '/includes/session.php';
$_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<?php $section_name = 'Administration Page';
include_once __DIR__ . '/includes/head.php' ?>
<body>
<?php include_once __DIR__ . '/includes/navbar.php' ?>
<div class="main-layout">
    <?php if (isset($_SESSION['role']) and check_accessibility($_SESSION['role'], ADMIN_GROUP)) : ?>
        <h1>Page is being built</h1>
    <?php else: ?>
        <?php include_once __DIR__ . '/pages/access_deny.php' ?>
    <?php endif; ?>
</div>