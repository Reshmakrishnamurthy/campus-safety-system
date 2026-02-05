<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Logged Out - CampusSecure</title>
<link rel="stylesheet" href="../assets/css/style.css">
<style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(135deg,#1E3A8A,#3B82F6);
    font-family: 'Inter', sans-serif;
    color: #fff;
    text-align: center;
}

.logout-container {
    background: #fff;
    color: #1E3A8A;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    width: 400px;
}

.logout-container h2 {
    margin-bottom: 20px;
    font-size: 24px;
}

.logout-container p {
    font-size: 16px;
    margin-bottom: 20px;
    color: #374151;
}

.logout-container a {
    display: inline-block;
    padding: 12px 20px;
    background: #1E3A8A;
    color: #fff;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    transition: 0.3s;
}

.logout-container a:hover {
    background: #163172;
}
</style>
</head>
<body>

<div class="logout-container">
    <h2>You have successfully logged out!</h2>
    <p>Thank you for using CampusSecure System.</p>
    <a href="../index.php">Back to Role Selection</a>
</div>

</body>
</html>