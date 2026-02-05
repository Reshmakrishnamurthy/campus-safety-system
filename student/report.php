<?php
include("../backend/db1.php"); 
if (!isset($_SESSION['student_id'])) {
    header("Location: ../auth/student_login.php");
    exit();
}

if ($_POST) {
    $r = $_POST['report'];
    $sid = $_SESSION['student_id'];
    $conn->query("INSERT INTO student_reports(student_id, report) VALUES('$sid','$r')");
    $success = " Your report has been sent successfully!";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Send Emergency Report</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../assets/style.css" rel="stylesheet">
<style>
    body {
        background: linear-gradient(to right, #f8f9fa, #e9ecef);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .report-card {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        padding: 2rem;
        transition: transform 0.3s;
    }

    .report-card:hover {
        transform: translateY(-5px);
    }

    h4 {
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: #dc3545;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-send {
        border-radius: 10px;
        font-weight: 500;
        padding: 0.6rem 1rem;
        background-color: #dc3545;
        border: none;
        transition: background 0.3s;
    }

    .btn-send:hover {
        background-color: #c82333;
    }

    .back-link {
        color: #6c757d;
        font-weight: 500;
    }

    .back-link:hover {
        color: #495057;
        text-decoration: none;
    }

    .success-message {
        background-color: #d1e7dd;
        color: #0f5132;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        margin-bottom: 1rem;
        text-align: center;
        font-weight: 500;
    }
</style>
</head>

<body>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="report-card col-md-6">
        <h4>📢 Report</h4>

        <?php if(isset($success)) : ?>
            <div class="success-message"><?= $success ?></div>
        <?php endif; ?>

        <form method="POST">
            <textarea class="form-control mb-3" name="report" rows="6" placeholder="Describe your emergency here..." required></textarea>
            <button class="btn btn-send w-100">Send Report</button>
        </form>

        <div class="text-center mt-3">
            <a href="dashboard.php" class="back-link">⬅ Back to Dashboard</a>
        </div>
    </div>
</div>
</body>
</html>
