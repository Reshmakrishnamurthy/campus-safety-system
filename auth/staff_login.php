<?php
session_start();
if(isset($_SESSION['staff'])){
    header("Location: ../staff/dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Staff Login - CampusSecure</title>
<link rel="stylesheet" href="../assets/css/style.css">
<style>
/* Center login form */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(135deg,#1E3A8A,#3B82F6);
    font-family: 'Inter', sans-serif;
}

.login-container {
    background: #fff;
    padding: 40px;
    border-radius: 12px;
    width: 400px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    text-align: center;
}

.login-container h2 {
    color: #1E3A8A;
    margin-bottom: 25px;
    font-size: 24px;
}

.login-container input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border-radius: 6px;
    border: 1px solid #D1D5DB;
    font-size: 16px;
}

.login-container button {
    width: 100%;
    padding: 12px;
    background: #1E3A8A;
    color: #fff;
    font-weight: 600;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    margin-top: 15px;
    font-size: 16px;
}

.login-container button:hover {
    background: #163172;
}

.login-container p {
    margin-top: 15px;
    font-size: 14px;
    color: #6B7280;
}
</style>
</head>
<body>

<div class="login-container">
    <h2>Staff Login</h2>

    <form action="staff_login_process.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <p>&copy; 2026 CampusSecure System</p>
</div>

</body>
</html>
