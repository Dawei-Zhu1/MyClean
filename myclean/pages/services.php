<?php
session_start();
include_once __DIR__ . '/../includes/config.php';
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/check_accessibility.php';

if (!$_SESSION['is_login']) {
    $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
    header('Location: /../pages/auth/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php $section_name = "Services";
include_once __DIR__.'/../includes/head.php'; ?>
<body>
<?php
include_once __DIR__ . '/../includes/navbar.php';
?>
<div class="container">
    <main class=" main-layout">
        <!-- Center Content -->
        <section class="services">
            <h2>Our Cleaning Services</h2>
            <div class="service-grid">
                <div class="service-card">
                    <h3>🧼 Home Cleaning</h3>
                    <p>Standard cleaning for apartments, houses, and townhomes. Includes dusting, sweeping, mopping, and
                        surface sanitization.</p>
                </div>
                <div class="service-card">
                    <h3>🏢 Office Cleaning</h3>
                    <p>Tailored services for offices and commercial spaces. Includes workstations, lobbies, conference
                        rooms, and restrooms.</p>
                </div>
                <div class="service-card">
                    <h3>🧽 Deep Cleaning</h3>
                    <p>Thorough and detailed cleaning that tackles hard-to-reach spots. Ideal for post-renovation or
                        spring
                        cleaning.</p>
                </div>
                <div class="service-card">
                    <h3>🚚 Move In/Out Cleaning</h3>
                    <p>Complete cleaning for tenants moving in or out. Includes cabinets, appliances, windows, and
                        more.</p>
                </div>
                <div class="service-card">
                    <h3>🧼 Carpet & Upholstery</h3>
                    <p>Professional cleaning of carpets, rugs, and upholstered furniture using eco-friendly methods.</p>
                </div>
                <div class="service-card">
                    <h3>🪟 Window Cleaning</h3>
                    <p>Interior and exterior window cleaning for homes and offices. Streak-free guarantee.</p>
                </div>
                <div class="service-card">
                    <h3>🎉 Event Cleanup</h3>
                    <p>Pre-event setup or post-event cleaning for parties, conferences, or other gatherings.</p>
                </div>
                <div class="service-card">
                    <h3>📝 Custom Cleaning</h3>
                    <p>Have something specific in mind? Contact us for custom quotes tailored to your needs.</p>
                </div>
            </div>
        </section>

    </main>

    <?php include_once '../includes/btn_book_a_service.php'?>
    <?php include_once __DIR__.'/../includes/footer.php'; ?>
</div>

</body>
</html>