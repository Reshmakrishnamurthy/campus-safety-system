<?php
include "config.php";
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body.bg {
    background: url('background.jpg') no-repeat center center fixed;
    background-size: cover;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.dashboard-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    padding: 2.5rem;
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    max-width: 500px;
    text-align: center;
}

.dashboard-card h2 {
    color: black;
    font-weight: 700;
    margin-bottom: 2rem;
    font-size: 1.8rem;
}

/* Cute square box buttons */
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}

.dashboard-box {
    background-color: #ffffff;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    color: #495057;
    text-decoration: none;
    transition: transform 0.2s, box-shadow 0.2s;
}

.dashboard-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.dashboard-box span.icon {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.dashboard-box span.text {
    font-size: 1rem;
    text-align: center;
}

.logout-box {
    background-color: #f8d7da;
    color: #842029;
}

@media (max-width: 480px) {
    .dashboard-grid {
        grid-template-columns: 1fr;
    }
}
</style>
</head>

<body class="bg">

<div class="dashboard-card">
    <h2>Admin Dashboard</h2>

    <div class="dashboard-grid">
        <a href="update_map.php" class="dashboard-box">
            <span class="icon">🗺️</span>
            <span class="text">Update Campus Map</span>
        </a>

        <a href="post_announcement.php" class="dashboard-box">
            <span class="icon">📢</span>
            <span class="text">Post Announcement</span>
        </a>

        <a href="send_alert.php" class="dashboard-box">
            <span class="icon">🚨</span>
            <span class="text">Alerts to Students</span>
        </a>

        <a href="logout.php" class="dashboard-box logout-box">
            <span class="icon">🚪</span>
            <span class="text">Logout</span>
        </a>
    </div>
</div>

</body>
</html>
