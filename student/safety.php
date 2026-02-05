<?php
include("../backend/db1.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Safety Procedures</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../assets/style.css" rel="stylesheet">
<style>
    body {
        background: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .header {
        text-align: center;
        margin: 2rem 0 1.5rem 0;
    }

    .header h3 {
        color: #0d6efd;
        font-weight: 700;
    }

    .procedure-card {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        padding: 1.25rem;
        background-color: #ffffff;
        transition: transform 0.2s;
    }

    .procedure-card:hover {
        transform: translateY(-3px);
    }

    .procedure-card h5 {
        font-weight: 600;
        color: #0d6efd;
    }

    .procedure-card p {
        color: #495057;
        margin-bottom: 0;
    }

    .map-section {
        margin-top: 2rem;
    }

    .map-card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .back-btn {
        display: inline-block;
        margin-top: 2rem;
        border-radius: 10px;
        padding: 0.6rem 1.2rem;
        font-weight: 500;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .back-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(0,0,0,0.15);
        text-decoration: none;
    }
</style>
</head>

<body>
<div class="container mt-4">

    <div class="header">
        <h3>🛡 Safety Procedures</h3>
        <p>Follow these guidelines to stay safe on campus</p>
    </div>

    <?php
    $res = $conn->query("SELECT * FROM safety_procedures");
    if ($res->num_rows == 0) {
        echo "<div class='alert alert-info text-center'>No safety procedures available</div>";
    }
    while ($p = $res->fetch_assoc()) {
        echo "
        <div class='procedure-card mb-3'>
            <h5>{$p['title']}</h5>
            <p>{$p['description']}</p>
        </div>";
    }
    ?>

    <div class="map-section">
        <h4 class="text-primary mb-3">📍 MMU Cyberjaya Map</h4>
        <div class="map-card">
            <iframe
            src="https://www.google.com/maps?q=Multimedia%20University%20Cyberjaya&output=embed"
            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <div class="text-center">
        <a href="dashboard.php" class="btn btn-light back-btn">⬅ Back to Dashboard</a>
    </div>

</div>
</body>
</html>
