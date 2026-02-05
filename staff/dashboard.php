<?php
session_start();
include "../backend/db.php";
if (!isset($_SESSION['staff'])) {
    header("Location: ../auth/staff_login.php");
    exit();
}

// Count data for dashboard cards
$complaints_pending = $conn->query("SELECT COUNT(*) AS cnt FROM complaints WHERE status='Pending'")->fetch_assoc()['cnt'];
$hazards_reported = $conn->query("SELECT COUNT(*) AS cnt FROM hazards")->fetch_assoc()['cnt'];

// Get current page name
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard - CampusSecure</title>
<link rel="stylesheet" href="../assets/css/style.css">
<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
/* Dashboard Cards */
.dashboard-cards {
    display: flex;
    gap: 20px;
    margin-top: 20px;
    flex-wrap: wrap;
}
.dashboard-card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    flex: 1;
    min-width: 200px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    text-align: center;
}
.dashboard-card h2 {
    font-size: 32px;
    margin-bottom: 8px;
}
.dashboard-card p {
    color: #6B7280;
    font-weight: 500;
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

    <a href="../auth/logout.php">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
  </div>

  <!-- Main Content -->
  <div class="main">
    <!-- Header with Welcome -->
    <div class="header" style="display:flex; justify-content: space-between; align-items:center;">
        <h1>Dashboard</h1>
        <span>Welcome, <?= $_SESSION['staff']['name'] ?></span>
    </div>

    <!-- Dashboard Cards -->
    <div class="dashboard-cards">
        <div class="dashboard-card">
            <i class="fas fa-file-alt" style="font-size:30px; color:#1E3A8A;"></i>
            <h2><?= $complaints_pending ?></h2>
            <p>Pending Complaints</p>
        </div>
        <div class="dashboard-card">
            <i class="fas fa-exclamation-triangle" style="font-size:30px; color:#F59E0B;"></i>
            <h2><?= $hazards_reported ?></h2>
            <p>Hazard Reports</p>
        </div>
        
    </div>

    <!-- Info Card -->
    <div class="card" style="margin-top:30px;">
        <h3>Quick Access</h3>
        <p>Select a module from the sidebar to manage complaints, report hazards, or view emergency status.</p>
    </div>

  </div>

</div>

</body>
</html>
