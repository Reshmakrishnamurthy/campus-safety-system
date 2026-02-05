<?php
session_start();
include "../backend/db.php";
if (!isset($_SESSION['staff'])) {
    header("Location: ../auth/staff_login.php");
    exit();
}

$currentPage = basename($_SERVER['PHP_SELF']);

// Fetch submitted hazards for display
$hazards = $conn->query("SELECT * FROM hazards ORDER BY reported_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Hazard Report - CampusSecure</title>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
/* Hazard cards */
.hazard-card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 15px;
}
.hazard-card img {
    width: 100px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
}
.hazard-card .content {
    flex: 1;
}
.hazard-card h3 {
    margin-bottom: 8px;
    color: #1E3A8A;
}
.hazard-card p {
    color: #374151;
    margin-bottom: 4px;
}
.hazard-card small {
    color: #6B7280;
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
    <div class="header" style="display:flex; justify-content: space-between; align-items:center;">
        <h1>Report Maintenance Hazard</h1>
        <span>Welcome, <?= $_SESSION['staff']['name'] ?></span>
    </div>

    <!-- Form to Submit Hazard -->
    <div class="card">
      <form action="../backend/submit_hazard.php" method="POST" enctype="multipart/form-data">
        <textarea name="description" placeholder="Describe the hazard clearly" required></textarea>
        <input type="file" name="photo">
        <input type="text" name="location" placeholder="Exact location" required>
        <button type="submit">Submit Hazard Report</button>
      </form>
    </div>

    <!-- Display Submitted Hazards -->
    <div class="header" style="margin-top:30px;">
        <h2>Submitted Hazards</h2>
    </div>

    <?php
    if($hazards->num_rows == 0){
        echo "<div class='card'>No hazards reported yet.</div>";
    } else {
        while($row = $hazards->fetch_assoc()){
            echo "<div class='hazard-card'>";
            if($row['photo']){
                echo "<img src='../assets/uploads/{$row['photo']}' alt='Hazard Image'>";
            } else {
                echo "<img src='../assets/uploads/default.png' alt='No Image'>";
            }
            echo "<div class='content'>
                    <h3>{$row['description']}</h3>
                    <p><strong>Location:</strong> {$row['location']}</p>
                    <small>Reported At: {$row['reported_at']}</small>
                  </div>";
            echo "</div>";
        }
    }
    ?>
  </div>

</div>
</body>
</html>
