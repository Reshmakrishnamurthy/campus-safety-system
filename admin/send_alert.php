<<?php
include("../backend/db1.php");


if (isset($_POST['send_alert'])) {
    $title = $_POST['title'];
    $message = $_POST['message'];

    $conn->query("INSERT INTO emergency_alerts(title,message)
    VALUES('$title','$message')");

    $success = "Emergency alert sent successfully!";
}

$notify = $conn->query("SELECT COUNT(*) AS total FROM student_reports WHERE status='new'");
$n = $notify->fetch_assoc();
$alertCount = $n['total'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin –Alerts</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background: linear-gradient(120deg, #1e1e1e, #3a0000);
    min-height: 100vh;
}
.card {
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.4);
}
.badge-notify {
    background: red;
    font-size: 14px;
}
</style>
</head>

<body>

<nav class="navbar navbar-dark bg-danger">
  <div class="container">
    <span class="navbar-brand fw-bold">ANNOUNCEMENT</span>
    <a href="dashboard.php" class="btn btn-light position-relative">
        Student Report
        <?php if ($alertCount > 0): ?>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-notify">
            <?= $alertCount ?>
        </span>
        <?php endif; ?>
    </a>
  </div>
</nav>

<div class="container mt-5 col-md-6">

<div class="card p-4">
<h4 class="mb-3">📢 Alert to Students</h4>

<?php if (isset($success)): ?>
<div class="alert alert-success"><?= $success ?></div>
<?php endif; ?>

<form method="POST">
    <div class="mb-3">
        <label class="form-label">Alert Title</label>
        <input class="form-control" name="title" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Alert Message</label>
        <textarea class="form-control" name="message" rows="4" required></textarea>
    </div>

    <button name="send_alert" class="btn btn-danger w-100">
        🚨 Send Alert
    </button>
</form>
</div>

<div class="text-center mt-3">
    <a href="view_student_alerts.php" class="btn btn-outline-light">
        👁 View Student Report

    </a>
</div>

</div>

</body>
</html>
