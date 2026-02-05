<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "campus_system");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

session_start();
?>
