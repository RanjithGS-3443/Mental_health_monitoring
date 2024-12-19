<?php
// db.php
$host = "localhost";
$username = "root"; // Default for XAMPP
$password = ""; // Default password is empty in XAMPP
$dbname = "mental_health_management";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
