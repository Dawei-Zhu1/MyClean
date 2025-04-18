<?php
session_start();
include_once __DIR__.'/../includes/config.php';
include_once __DIR__.'/../includes/session.php';
$_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<?php $section_name = "About Us";
require_once __DIR__.'/../includes/head.php';
?>
<body>
<?php include_once '../includes/navbar.php' ?>
<div class="container">
    <div class="main-layout ">
        <!-- Center Content -->,
        <section class="about">
            <h2>Who We Are</h2>
            <p>MyClean is a digital platform dedicated to connecting customers with reliable, professional cleaning
                service providers. Whether you’re a busy homeowner or a commercial office in need of regular cleaning,
                MyClean makes booking easy and efficient.</p>

            <h2>Our Mission</h2>
            <p>We strive to simplify the process of hiring tru,sted cleaners by offering a platform that prioritizes
                transparency, convenience, and top-quality service. We’re committed to creating clean, healthy spaces
                for all.</p>

            <section class="values">
                <h3>Our Values</h3>
                <ul>
                    <li>✅ Reliability: We connect you with dependable service providers.</li>
                    <li>🌿 Sustainability: We encourage eco-friendly cleaning practices.</li>
                    <li>💬 Transparency: Clear communication and fair pricing at every step.</li>
                    <li>🛡️ Trust: All cleaners undergo background checks and reviews.</li>
                </ul>
            </section>

            <section class="team">
                <h3>Our Team</h3>
                <p>Founded by a group of passionate individuals who believe in cleanliness, professionalism, and digital
                    accessibility, MyClean brings together tech innovation and real-world service needs.</p>
            </section>
        </section>
    </div>
</div>
<?php
include_once __DIR__.'/../includes/btn_book_a_service.php';
include_once __DIR__.'/../includes/footer.php'
?>
</body>