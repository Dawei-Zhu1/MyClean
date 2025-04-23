<?php
session_start();
$total = $_POST['total_cost'] ?? 0;
$customer = $_POST['first_name'] ?? 'Customer';
$payment_flag = 0; // -1 is unavailable, 1 is finished

include_once __DIR__ . '/../Database.php';
$order_id = $_GET['order_id'];
$db = new Database();
/*After payment*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $db->conn->prepare("SELECT * FROM `ORDER` WHERE `id` = ? AND `payment_finished` = 0");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $stmt->store_result();
//If the order is paid or not found
    if (!$stmt->num_rows) {
        $payment_flag = 1;
    } else {
        $stmt = $db->conn->prepare("UPDATE `ORDER` SET `payment_finished` = '1' WHERE (`id` = ?);");
        $stmt->bind_param('i', $order_id);
        $stmt->execute();
        $stmt->store_result();
    }
} else {
    $stmt = $db->conn->prepare("SELECT * FROM `ORDER` WHERE `id` = ? AND `payment_finished` = 0");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $stmt->store_result();
//If the order is paid or not found
    if (!$stmt->num_rows) {
        $payment_flag = -1;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<?php $section_name = 'Payment';
include __DIR__ . '/../includes/head.php' ?>
<body>
<?PHP include __DIR__ . '/../includes/navbar.php' ?>
<h2>Payment for Booking</h2>

<!--<p>Hello <strong>--><?php //= htmlspecialchars($customer) ?><!--</strong>, your total amount due is:</p>-->
<!--<h3>$--><?php //= number_format($total, 2) ?><!--</h3>-->

<?php $stmt = $db->conn->prepare("SELECT * FROM `ORDER` WHERE `id` = ? AND `payment_finished` = 1");
$stmt->bind_param('i', $order_id);
$stmt->execute();
$stmt->store_result();
if ($payment_flag == -1): ?>
    <h1>This transaction is unavailable</h1>
<?php elseif ($payment_flag == 1) : ?>
    <h1>This transaction is finished</h1>
<?php //If the order is paid
elseif ($stmt->num_rows) : ?>

    <h1>Payment successful</h1>

<?php else: ?>
    <form action="./payment.php?order_id=<?= $order_id ?>" method="POST">
        <?php
        $total = $db->calculatePrice($order_id);
        ?>
        <input type="hidden" name="total_cost" value="<?= $total ?>">
        <input type="hidden" name="customer_name" value="<?= htmlspecialchars($customer) ?>">

        <fieldset>
            <legend>Select Payment Method</legend>
            <label><input type="radio" name="payment_method" value="credit_card" required> Credit/Debit Card</label><br>
            <label><input type="radio" name="payment_method" value="paypal"> PayPal</label>
        </fieldset>

        <!-- Credit/Debit Card Details -->
        <div id="cardDetails" style="display: none; margin-top: 10px;">
            <label>Card Number:</label><br>
            <input type="text" name="card_number" maxlength="16"><br>
            <label>Expiry Date:</label><br>
            <input type="month" name="expiry_date"><br>
            <label>CVV:</label><br>
            <input type="text" name="cvv" maxlength="4">
        </div>

        <!-- PayPal Details -->
        <div id="paypalDetails" style="display: none; margin-top: 10px;">
            <label>PayPal Email:</label><br>
            <input type="email" name="paypal_email" placeholder="your@email.com">
        </div>

        <button type="submit">Pay Now</button>
    </form>

    <script>
        const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
        const cardDetails = document.getElementById('cardDetails');
        const paypalDetails = document.getElementById('paypalDetails');
        paypalDetails.style = 'none';

        paymentRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.value === 'credit_card') {
                    cardDetails.display = 'block';
                    paypalDetails.style.display = 'none';
                } else if (this.value === 'paypal') {
                    cardDetails.display = 'none';
                    paypalDetails.style.display = 'block';
                }
            });
        });
    </script>
<?php endif; ?>

</body>
</html>
