<?php
session_start();
include "../backend/db.php";
if (!isset($_SESSION['staff'])) {
    header("Location: ../auth/staff_login.php");
    exit();
}

// Get current page for sidebar active link
$currentPage = basename($_SERVER['PHP_SELF']);

// Fetch complaints
$complaints = $conn->query("SELECT * FROM complaints ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Complaints - CampusSecure</title>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    <div class="header" style="display:flex; justify-content: space-between; align-items:center;">
        <h1>Manage Complaints</h1>
        <span>Welcome, <?= $_SESSION['staff']['name'] ?></span>
    </div>

    <div class="card">
      <table>
        <tr>
          <th>ID</th>
          <th>Complaints</th>
          <th>Status</th>
          <th>Action</th>

        </tr>
        <?php
        if($complaints->num_rows == 0){
            echo "<tr><td colspan='4' style='text-align:center;'>No complaints found</td></tr>";
        }
        while($row = $complaints->fetch_assoc()) {
            $statusClass = strtolower($row['status']);
            echo "<tr>
                <td>{$row['complaint_id']}</td>
                <td>{$row['title']}</td>
                <td><span class='status {$statusClass}'>{$row['status']}</span></td>
                <td><a href='assign_complaint.php?id={$row['complaint_id']}'>Assign</a></td>
            </tr>";
        }
        ?>
      </table>
    </div>

  </div>

</div>
</body>
</html>
