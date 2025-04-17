<?php
session_start();
include_once 'session.php';
$_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">
<?php $section_name = "Contact";
include_once 'head.php' ?>
<body>
<?php
include_once 'navbar.php'
?>
<div class="main-layout">

    <!-- Contact info Content -->
    <section class="contact">
        <h2>How to Reach Us</h2>

        <div class="contact-details">
            <p><strong>Phone:</strong> <a href="tel:+1234567890">+1 (234) 567-890</a></p>
            <p><strong>Fax:</strong> +1 (234) 567-8910</p>
            <p><strong>Email:</strong> <a href="mailto:support@myclean.com">support@myclean.com</a></p>
            <p><strong>Address:</strong> 123 Clean Street, Sparkle City, ST 12345</p>
        </div>

        <div class="map-container">
            <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0194822063793!2d-122.41990648468189!3d37.77492927975907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085808c2dcb1cfd%3A0x1e0507f01b34015c!2sSan+Francisco%2C+CA!5e0!3m2!1sen!2sus!4v1615923846039!5m2!1sen!2sus"
                    width="100%"
                    height="300"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
            </iframe>
        </div>
    </section>


</div>
<?php
include_once 'btn_book_a_service.php';
include_once 'footer.php'
?>
</body>
</html>