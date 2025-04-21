<?php
session_start();
header('Location:' . $_SERVER["HTTP_REFERER"]);
include_once '../Database.php';
$db = new Database();

$uid = $_SESSION['uid'];

$first_name = trim(htmlspecialchars($_POST['first_name']));
$last_name = trim(htmlspecialchars($_POST['last_name']));
$dob = trim(htmlspecialchars($_POST['dob']));
$email = trim(htmlspecialchars($_POST['email']));
$phone = trim(htmlspecialchars($_POST['phone']));
$address1 = trim(htmlspecialchars($_POST['address1']));
$address2 = trim(htmlspecialchars($_POST['address2']));
$city = trim(htmlspecialchars($_POST['city']));
$state = trim(htmlspecialchars($_POST['state']));
$postcode = trim(htmlspecialchars($_POST['postcode']));

$query = "UPDATE `MYCLEANDB`.`USER` 
SET 
    `first_name` = '$first_name',
    `last_name` = '$last_name',
    `DoB` = '$dob',
    `email` = '$email',
    `phone` = '$phone',
    `address1` = '$address1',
    `address2` = '$address2',
    `city` = '$city',
    `state` = '$state',
    `postcode` = '$postcode'
WHERE (`id` = '$uid');";

$result = $db->pass_query($query);
exit;
