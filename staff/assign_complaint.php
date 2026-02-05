<?php
session_start();
include "../backend/db.php";

if (!isset($_SESSION['staff'])) {
    header("Location: ../auth/staff_login.php");
    exit();
}

// Get current page for sidebar active link
$currentPage = basename($_SERVER['PHP_SELF']);

// Get complaint ID from URL
if (!isset($_GET['id'])) {
    header("Location: complaints.php");
    exit();
}

$complaint_id = intval($_GET['id']);

// Assign complaint: update status to 'Assigned'
$update = $conn->query("UPDATE complaints SET status='Assigned' WHERE complaint_id=$complaint_id");

// Fetch updated complaint details
$complaint = $conn->query("SELECT * FROM complaints WHERE complaint_id=$complaint_id")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Assign Complaint - CampusSecure</title>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
.confirmation-card {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    text-align: center;
    margin-top: 30px;
}
.confirmation-card h2 {
    color: #1E3A8A;
    margin-bottom: 15px;
}
.confirmation-card p {
    color: #374151;
    font-weight: 500;
    margin-bottom: 20px;
}
.confirmation-card a {
    display: inline-block;
    padding: 12px 20px;
    background: #1E3A8A;
    color: #fff;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
}
.confirmation-card a:hover {
    background: #163172;
}
</style>
</head>
<body>

<div class="wrapper">

  <!-- Sidebar -->
  <div class="sidebar">
    <h2>CampusSecure</h2>
    <a href="dashboard.php" class="<?= ($currentPage == 'dashboard.php') ? 'active' : '' ?>">
        <i class="fas fa-tachometer-alt"></i> Dashboard
    </a>
    <a href="complaints.php" class="<?= ($currentPage == 'complaints.php') ? 'active' : '' ?>">
        <i class="fas fa-file-alt"></i> Complaints
    </a>
    <a href="hazard_report.php" class="<?= ($currentPage == 'hazard_report.php') ? 'active' : '' ?>">
        <i class="fas fa-exclamation-triangle"></i> Hazard Report
    </a>
    <a href="emergency_status.php" class="<?= ($currentPage == 'emergency_status.php') ? 'active' : '' ?>">
        <i class="fas fa-bell"></i> Emergency Status
    </a>
    <a href="../auth/logout.php">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
  </div>

  <!-- Main Content -->
  <div class="main">
    <div class="header" style="display:flex; justify-content: space-between; align-items:center;">
        <h1>Assign Complaint</h1>
        <span>Welcome, <?= $_SESSION['staff']['name'] ?></span>
    </div>

    <div class="confirmation-card">
        <?php if($update): ?>
            <h2>Complaint Assigned Successfully!</h2>
            <p>Complaint ID: <?= $complaint['complaint_id'] ?><br>
               Title: <?= $complaint['title'] ?><br>
               Status: <?= $complaint['status'] ?></p>
            <a href="complaints.php">Back to Complaints</a>
        <?php else: ?>
            <h2>Failed to Assign Complaint</h2>
            <p>Please try again or contact administrator.</p>
            <a href="complaints.php">Back to Complaints</a>
        <?php endif; ?>
    </div>

  </div>

</div>
</body>
</html>
