<?php
session_start();
include_once 'session.php';
$_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="en">
<?php include_once 'head.php' ?>
<body>
<?php include_once 'navbar.php' ?>
<div class="main-layout">
    <!-- Left Pane -->
    <aside class="left-pane">
        <section class="news">
            <h2>News & Promotions</h2>
            <ul>
                <li><strong>✨ New Feature:</strong> Real-time tracking now available for customers!</li>
                <li><strong>🔥 Promo:</strong> 25% off your first booking – Use <code>WELCOME15</code></li>
                <li><strong>📢 Update:</strong> Weekend cleaning now available!</li>
            </ul>
        </section>
    </aside>

    <!-- Center Content -->
    <section class="services">
        <h2>Top Rated Cleaning Service</h2>
        <div class="service-grid">
            <div class="service-card">
                <h3>🧼 Home Cleaning</h3>
                <p>General dusting, vacuuming, and surface sanitizing for your home.</p>
            </div>
            <div class="service-card">
                <h3>🏢 Office Cleaning</h3>
                <p>Professional workspace cleaning for productivity and hygiene.</p>
            </div>
            <div class="service-card">
                <h3>🧽 Deep Cleaning</h3>
                <p>Thorough top-to-bottom cleaning for a fresh, renewed environment.</p>
            </div>
        </div>
    </section>

</div>
<?php
include_once 'btn_book_a_service.php';
include_once 'footer.php'
?>
</body>
</html>
