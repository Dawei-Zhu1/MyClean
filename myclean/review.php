<?php
global $conn;
session_start();
include_once 'session.php';
$_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];

//$db = new Database(); // create instance
//$conn = $_SERVER->conn; // get the connection

?>
<!DOCTYPE html>
<html lang="en">
<?php $section_name = "Services";
include_once 'head.php'; ?>
<body>
<?php
include_once 'navbar.php';
?>
<div class="container">
    <main class=" main-layout">

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

                <button type="submit">Submit Review</button>
            </form>
        </section>

        <!-- Display Reviews -->
        <section class="reviews">
            <h2>Customers Revies</h2>
            <?php
            $query = "SELECT * FROM reviews ORDER BY created_at DESC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0):
                while ($row = mysqli_fetch_assoc($result)):
                    ?>
                    <div class="review">
                        <h4><?= htmlspecialchars($row['customer_name']) ?> (<?= htmlspecialchars($row['service_type']) ?>)</h4>
                        <p><?= str_repeat("⭐", $row['rating']) ?></p>
                        <p><?= nl2br(htmlspecialchars($row['comment'])) ?></p>
                        <small>Posted on <?= date("F j, Y", strtotime($row['created_at'])) ?></small>
                    </div>
                <?php
                endwhile;
            else:
                echo "<p>No reviews yet. Be the first to leave one!</p>";
            endif;
            ?>
        </section>
    </main>

    <a href="login.php" class="floating-book-btn">Book a Service</a>
    <?php include_once 'footer.php'; ?>
</div>

</body>
</html>