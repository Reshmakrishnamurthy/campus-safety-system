<?php
include("../backend/db1.php");

/* Mark alerts as read */
$conn->query("UPDATE student_reports SET status='read' WHERE status='new'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Report</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-5 col-md-8">
<h3> Student Report</h3>

<?php
$res = $conn->query("SELECT * FROM student_reports ORDER BY created_at DESC");

if ($res->num_rows == 0) {
    echo "<div class='alert alert-success'>No alerts</div>";
}

while ($r = $res->fetch_assoc()) {
    echo "
    <div class='card mb-3 p-3'>
        <h6>Student ID: {$r['student_id']}</h6>
        <p>{$r['report']}</p>
        <small class='text-muted'>{$r['created_at']}</small>
    </div>";
}
?>

<a href="send_alert.php" class="btn btn-secondary">⬅ Back</a>
<a href="logout.php">Logout</a>
</div>
</body>
</html>
