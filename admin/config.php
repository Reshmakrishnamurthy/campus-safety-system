<?php
session_start();

$conn = new mysqli("localhost", "root", "", "campus_system");
if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}
?>
