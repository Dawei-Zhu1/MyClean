<?php
$total = $_POST['total_cost'] ?? 0;
$customer = $_POST['first_name'] ?? 'Customer';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyClean - Payment</title>

</head>
<body>

<h2>Payment for Booking</h2>

<p>Hello <strong><?= htmlspecialchars($customer) ?></strong>, your total amount due is:</p>
<h3>$<?= number_format($total, 2) ?></h3>

<form action="payment.php" method="POST">
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

</body>
</html>
