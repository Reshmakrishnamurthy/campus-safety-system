<?php
$conn = new mysqli("localhost", "root", "", "campus_system");
if ($conn->connect_error) {
    die("Database connection failed");
}
?>
