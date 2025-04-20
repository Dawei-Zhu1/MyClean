<?php
session_start();
include_once __DIR__.'/../includes/session.php';
$_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">
<?php $section_name = "Reviews";
include_once __DIR__.'/../includes/head.php' ?>
<body>
<?php include_once __DIR__.'/../includes/navbar.php' ?>
<div class="main-layout">

    <!-- Customer Review Form -->
    <section class="review-form">
        <h3>Leave a Review</h3>
        <form action="submit_review.php" method="POST">
            <div style="margin-bottom: 10px;">
                <label for="customer_name">Your Name:</label><br>
                <input type="text" id="customer_name" name="customer_name" required>
            </div>

            <div style="margin-bottom: 10px;">
                <label for="service_type">Service Type:</label><br>
                <select id="service_type" name="service_type" required>
                    <option value="">Select Service</option>
                    <option value="Home Cleaning">Home Cleaning</option>
                    <option value="Office Cleaning">Office Cleaning</option>
                    <option value="Deep Cleaning">Deep Cleaning</option>
                    <option value="Other Cleaning">Other Cleaning</option>
                </select>
            </div>

            <div style="margin-bottom: 10px;">
                <label for="rating">Rating:</label><br>
                <select id="rating" name="rating" required>
                    <option value="">Rate</option>
                    <option value="5">⭐⭐⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐</option>
                    <option value="3">⭐⭐⭐</option>
                    <option value="2">⭐⭐</option>
                    <option value="1">⭐</option>
                </select>
            </div>

            <div style="margin-bottom: 10px;">
                <label for="comment">Your Review:</label><br>
                <textarea id="comment" name="comment" rows="4" required></textarea>
            </div>

            <button type="submit" style="padding: 8px 16px; font-weight: bold;">Submit Review</button>
        </form>
    </section>

</div>
<?php
include_once __DIR__.'/../includes/btn_book_a_service.php';
include_once __DIR__.'/../includes/footer.php'
?>
</body>
</html>
