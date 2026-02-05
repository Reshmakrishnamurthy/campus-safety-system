<?php
$conn = new mysqli("localhost", "root", "", "campus_security");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
