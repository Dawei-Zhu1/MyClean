<?php
session_start();
include_once __DIR__ . '/../Database.php';
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();

    $uid = $_SESSION['uid'];
    $customer_name = htmlspecialchars(trim($_POST['customer_name']));
    $address = htmlspecialchars(trim($_POST['address']));
    /*Order quantity*/
    $room_quantity = $_POST['rooms'];
    $bathroom_quantity = $_POST['bathrooms'];
    $kitchen_quantity = $_POST['kitchens'];
    $services = $_POST['service'];
    $planned_datetime = $_POST['planned_datetime'];
    echo "$uid $address $planned_datetime";
// Write into order first
    print_r($_POST['service']);
    $_POST['order_id'] = $db->createOrder($uid, $customer_name, $address, $services, $room_quantity, $bathroom_quantity, $kitchen_quantity, $planned_datetime);

    header('Location: /pages/payment.php?order_id=' . $_POST['order_id']);
}
/*Fields*/


