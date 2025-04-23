<h1>Test Database Insertion</h1>
<section>
    There should be something below, if there isn't, then something's wrong.
</section>

<?php
require "Database.php";
$db = new Database();
$conn = $db->conn;

// Get form
$content = $_POST['box_content'];
// set query
$sql = "INSERT INTO TEST (content) VALUES ('$content')";
$result = $conn->query($sql);

$conn->close();
?>