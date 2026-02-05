<?php
session_start();
include "../backend/db.php";

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM staff WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $_SESSION['staff'] = $result->fetch_assoc();
    header("Location: ../staff/dashboard.php");
    exit();
} else {
    echo "<p style='color:red; text-align:center; margin-top:20px;'>Invalid email or password</p>";
}
?>
