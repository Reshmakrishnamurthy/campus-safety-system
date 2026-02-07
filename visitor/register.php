<?php
session_start();
include 'includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $purpose = $_POST['purpose'];

    $stmt = $conn->prepare(
        "INSERT INTO visitors (name, phone, email, purpose, created_at)
         VALUES (?, ?, ?, ?, NOW())"
    );
    $stmt->bind_param("ssss", $name, $phone, $email, $purpose);
    $stmt->execute();

    // ✅ ALLOW ACCESS AFTER REGISTER
    $_SESSION['visitor_registered'] = true;

    // Optional (for display)
    $_SESSION['visitor_name'] = $name;

    // Redirect to map page
    header("Location: map.php");
    exit();
}
?>
