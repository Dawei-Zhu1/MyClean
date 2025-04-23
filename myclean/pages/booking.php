<?php
session_start();
include_once __DIR__ . '/../Database.php';
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/config.php';
$db = new Database();
$user_info = $db->getUser('uid', $_SESSION['uid']);
$user_name = sprintf('%s %s',
    $user_info['first_name'],
    $user_info['last_name']
);
$user_address = sprintf('%s %s %s %s %s',
    $user_info['address1'],
    $user_info['address2'],
    $user_info['city'],
    $user_info['state'],
    $user_info['postcode']
);

if (!isset($_SESSION['is_login']) or !$_SESSION['is_login']) {
    $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
    header('Location: /pages/auth/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once '../includes/head.php' ?>
<body>
<?php include_once '../includes/navbar.php' ?>
<h2>Book a Cleaning Service</h2>
<form id="bookingForm" action="submit_booking.php" method="POST">
    <input type="text" name="customer_name" placeholder="Your Name"
           value="<?= $user_name ?>" required>
    <input type="text" name="address" placeholder="Address"
           value="<?= $user_address ?>" required>

    <fieldset>
        <legend>Select Cleaning Service(s):</legend>
        <label><input type="checkbox" name="service[1]" class="service" value="Home Cleaning"> Home Cleaning
            ($50)</label><br>
        <label><input type="checkbox" name="service[2]" class="service" value="Office Cleaning"> Office Cleaning ($200)</label><br>
        <label><input type="checkbox" name="service[3]" class="service" value="Deep Cleaning"> Deep Cleaning
            ($100)</label><br>
        <label><input type="checkbox" name="service[4]" class="service" value="Other Cleaning" id="otherCleaning"> Other
            Cleaning ($90)</label>
        <input type="text" name="other_details" id="otherDetails" placeholder="Please describe other cleaning..."
               style="display:none; margin-top: 5px;">
    </fieldset>

    <label for="rooms">Number of Rooms to Clean ($25 each):</label>
    <input type="number" name="rooms" id="rooms" min="0" value="0" required>

    <label for="bathrooms">Number of Bathrooms ($40 each):</label>
    <input type="number" name="bathrooms" id="bathrooms" min="0" value="0" required>

    <label for="kitchens">Number of Kitchens ($35 each):</label>
    <input type="number" name="kitchens" id="kitchens" min="0" value="0" required>

    <label for="planned_datetime">Preferred Date & Time:</label>
    <input type="datetime-local" name="planned_datetime" id="planned_datetime" required>

    <input type="hidden" name="total_cost" id="totalCostInput">
    <p id="totalCostDisplay">Estimated Total: $<span id="totalAmount">0</span></p>

    <button type="submit">Book Now</button>
</form>

<script>
    const serviceCheckboxes = document.querySelectorAll('.service');
    const otherCleaning = document.getElementById("otherCleaning");
    const otherDetails = document.getElementById("otherDetails");
    const rooms = document.getElementById("rooms");
    const bathrooms = document.getElementById("bathrooms");
    kitchens = document.getElementById("kitchens");
    totalAmount = document.getElementById("totalAmount");
    totalCostInput = document.getElementById("totalCostInput");

    const servicePrices = {
        "Home Cleaning": 50,
        "Office Cleaning": 200,
        "Deep Cleaning": 100,
        "Other Cleaning": 90
    };

    function calculateTotal() {
        let total = 0;
        serviceCheckboxes.forEach(cb => {
            if (cb.checked) {
                total += servicePrices[cb.value] || 0;
            }
        });

        otherDetails.style.display = otherCleaning.checked ? "block" : "none";

        const roomCost = (parseInt(rooms.value) || 0) * 25;
        const bathroomCost = (parseInt(bathrooms.value) || 0) * 40;
        const kitchenCost = (parseInt(kitchens.value) || 0) * 35;

        total += roomCost + bathroomCost + kitchenCost;

        totalAmount.textContent = total;
        totalCostInput.value = total;
    }

    serviceCheckboxes.forEach(cb => cb.addEventListener("change", calculateTotal));
    rooms.addEventListener("input", calculateTotal);
    bathrooms.addEventListener("input", calculateTotal);
    kitchens.addEventListener("input", calculateTotal);

    document.addEventListener("DOMContentLoaded", calculateTotal);
</script>

</body>
</html>
