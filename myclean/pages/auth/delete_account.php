<?php
session_start();
include_once __DIR__ . '/../../Database.php'; // your database connection file
include_once __DIR__.'/authenticate.php';
// Example only: Adjust based on your user system
$userId = htmlspecialchars($_SESSION['uid']) ?? null;
$password = $_POST['password'] ?? '';

if (!$userId || !$password) {
    die('Missing information.');
}

// Connect to database
$db = new Database();

if (authenticate()) {
    // Delete the user account
    $db->pass_query("DELETE FROM `USER` WHERE id = $userId");
    // Optionally destroy session
    echo "Your account has been deleted.";
    session_destroy();
    // Redirect to goodbye page
    // header("Location: goodbye.php");
} else {
    echo "Password incorrect.";
    // Redirect back with an error
    // header("Location: login.php?error=wrongpassword");
}
exit;
