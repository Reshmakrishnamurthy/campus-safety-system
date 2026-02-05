<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../backend/db1.php");

if (!isset($_SESSION['student_id'])) {
    header("Location: ../auth/student_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Dashboard</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../assets/style.css" rel="stylesheet">
<style>
    body {
        background: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar {
        background-color: #dc3545;
    }

    .navbar .navbar-brand {
        color: #fff;
        font-weight: 600;
    }

    .navbar .btn-light {
        font-weight: 500;
    }

    .dashboard-header {
        margin-top: 2rem;
        margin-bottom: 2rem;
        text-align: center;
    }

    .dashboard-header h2 {
        color: #dc3545;
        font-weight: 700;
    }

    .dashboard-header p {
        color: #6c757d;
    }

    .card-alert {
        border-left: 5px solid #dc3545;
        border-radius: 10px;
        padding: 1rem 1.25rem;
        background-color: #fff3f3;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        transition: transform 0.2s;
    }

    .card-alert:hover {
        transform: translateY(-3px);
    }

    .card-alert h5 {
        font-weight: 600;
        color: #dc3545;
    }

    .card-alert p {
        margin-bottom: 0;
        color: #495057;
    }

    .dashboard-buttons {
        margin-top: 2rem;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        justify-content: center;
    }

    .dashboard-buttons .btn {
        border-radius: 10px;
        padding: 0.6rem 1.2rem;
        font-weight: 500;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .dashboard-buttons .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(0,0,0,0.15);
    }
</style>
</head>

<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand">Announcement</a>
    <a href="logout.php" class="btn btn-light">Logout</a>
  </div>
</nav>

<div class="container dashboard-header">
    <h2>Welcome, Student</h2>
    <p>Stay updated with the latest alerts</p>
</div>

<div class="container">
    <?php
    $res = $conn->query("SELECT * FROM emergency_alerts ORDER BY created_at DESC");
    if ($res->num_rows == 0) {
        echo "<div class='alert alert-success text-center'> No current emergencies</div>";
    }
    while ($a = $res->fetch_assoc()) {
        echo "
        <div class='card-alert mb-3'>
            <h5>🚨 {$a['title']}</h5>
            <p>{$a['message']}</p>
            <small class='text-muted'>".date('d M Y, H:i', strtotime($a['created_at']))."</small>
        </div>";
    }
    ?>

    <div class="dashboard-buttons">
        <a href="report.php" class="btn btn-danger">📢 Send Report</a>
        <a href="safety.php" class="btn btn-secondary">🛡 Safety & Map</a>
    </div>
</div>

</body>
</html>
