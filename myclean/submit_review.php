<?php
require_once 'Database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $name = trim($_POST['customer_name']);
    $service = trim($_POST['service_type']);
    $rating = intval($_POST['rating']);
    $comment = trim($_POST['comment']);

    // Basic validation
    if (empty($name) || empty($service) || $rating < 1 || $rating > 5 || empty($comment)) {
        echo "Please fill out all fields correctly.";
        exit;
    }

    // Connect to the database
    $db = new Database();
    $conn = $db->conn;

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO reviews (customer_name, service_type, rating, comment, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssis", $name, $service, $rating, $comment);

    // Execute and redirect
    if ($stmt->execute()) {
        header("Location: review.php?success=1");
        exit;
    } else {
        echo "Error saving review: " . $conn->error;
    }

    $stmt->close();
    $db->close();
} else {
    // If someone tries to access this file directly
    header("Location: review.php");
    exit;
}

