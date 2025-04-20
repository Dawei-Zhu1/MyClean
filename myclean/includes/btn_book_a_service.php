<?php
//session_start();
//If is solo
if (basename($_SERVER['PHP_SELF']) == 'btn_book_a_service.php') {
    include_once __DIR__ . '/head.php';
}
/*Detect whether the user is logged in, then decide to direct to login or booking page*/
$link = (!isset($_SESSION['is_login']) or !$_SESSION['is_login']) ? '../pages/auth/login.php' : '../pages/booking.php';
?>

<a href='<?= $link ?>' class="floating-book-btn">Book a Service</a>