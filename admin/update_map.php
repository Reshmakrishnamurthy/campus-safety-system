<?php
// SHOW ERRORS (REMOVE AFTER DEMO)
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "config.php";

// Admin check
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$success = "";
$error = "";

// Handle form submit
if (isset($_POST['update'])) {

    $exits = trim($_POST['emergency_exits']);
    $zones = trim($_POST['safety_zones']);
    $date  = $_POST['effective_date'];

    if ($exits == "" || $zones == "" || $date == "") {
        $error = "❌ All fields are required.";
    } elseif (!isset($_FILES['map_image'])) {
        $error = "❌ Map image required.";
    } else {

        $file = $_FILES['map_image'];

        if ($file['error'] !== 0) {
            $error = "❌ File upload error.";
        } else {

            $allowed = ['jpg','jpeg','png'];
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed)) {
                $error = "❌ Only JPG or PNG allowed.";
            } else {

                // Ensure uploads folder exists
                $uploadDir = "../uploads/";
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $filename = "map_" . time() . "." . $ext;
                $target = $uploadDir . $filename;

                if (move_uploaded_file($file['tmp_name'], $target)) {

                    $stmt = $conn->prepare(
                        "INSERT INTO campus_map_updates 
                        (map_image, emergency_exits, safety_zones, effective_date)
                        VALUES (?, ?, ?, ?)"
                    );
                    $stmt->bind_param("ssss", $filename, $exits, $zones, $date);

                    if ($stmt->execute()) {
                        $success = "✅ Campus map published successfully!";
                    } else {
                        $error = "❌ Database insert failed.";
                    }

                } else {
                    $error = "❌ Unable to save image to uploads folder.";
                }
            }
        }
    }
}

// Get latest map
$current = $conn->query(
    "SELECT * FROM campus_map_updates ORDER BY created_at DESC LIMIT 1"
)->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Campus Map</title>
    <link rel="stylesheet" href="../style.css">

    <style>
        .bg { margin: 0; 
          font-family: "Segoe UI", Arial, sans-serif; 
          background: url("background.jpg") no-repeat center fixed; 
          background-size: cover; min-height: 100vh; }

        .page-wrapper {
            max-width: 1100px;
            margin: 40px auto;
            padding: 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 25px;
            align-items: start;
        }

        .panel {
            background: #ffffff;
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .panel h3 {
            margin-bottom: 15px;
            color: #1E3A8A;
        }

        .map-preview img {
            width: 100%;
            max-height: 260px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        .map-preview p {
            font-size: 14px;
            margin-top: 8px;
            color: #374151;
        }

        form label {
            font-weight: 600;
            margin-top: 12px;
            display: block;
        }

        form input,
        form textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            margin-top: 6px;
            font-size: 14px;
        }

        form textarea {
            min-height: 100px;
        }

        form button {
            margin-top: 18px;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 10px;
            background: #1E40AF;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        form button:hover {
            background: #1E3A8A;
        }

        .success {
            color: #065F46;
            font-weight: bold;
        }

        .error {
            color: #B91C1C;
            font-weight: bold;
        }

        .links {
            margin-top: 20px;
            text-align: center;
        }

        .links a {
            margin: 0 10px;
            text-decoration: none;
            font-weight: 600;
            color: #1E3A8A;
        }
    </style>
</head>

<body class="bg">

<div class="page-wrapper">

    <h2 style="margin-bottom:50px;">🗺️ Update Campus Map </h2>

    <p class="success"><?php echo $success; ?></p>
    <p class="error"><?php echo $error; ?></p>

    <div class="grid">

        <!-- LEFT: Current Map Preview -->
        <div class="panel map-preview">
            <h3>Current Published Map</h3>

            <?php if ($current && file_exists("../uploads/" . $current['map_image'])) { ?>
                <img src="../uploads/<?php echo htmlspecialchars($current['map_image']); ?>">
                <p><strong>Emergency Exits:</strong><br>
                    <?php echo nl2br(htmlspecialchars($current['emergency_exits'])); ?>
                </p>
                <p><strong>Safety Zones:</strong><br>
                    <?php echo nl2br(htmlspecialchars($current['safety_zones'])); ?>
                </p>
                <p><strong>Effective Date:</strong>
                    <?php echo $current['effective_date']; ?>
                </p>
            <?php } else { ?>
                <p>No campus map published yet.</p>
            <?php } ?>
        </div>

        <!-- RIGHT: Update Form -->
        <div class="panel">
            <h3>Publish New Campus Map</h3>

            <form method="POST" enctype="multipart/form-data">
                <label>Upload New Map Image</label>
                <input type="file" name="map_image" required>

                <label>Emergency Exits</label>
                <textarea name="emergency_exits" required></textarea>

                <label>Safety Zones</label>
                <textarea name="safety_zones" required></textarea>

                <label>Effective Date</label>
                <input type="date" name="effective_date" required>

                <button type="submit" name="update">Publish Map</button>
            </form>
        </div>

    </div>

    <div class="links">
        <a href="dashboard.php">⬅ Back to Dashboard</a>
        <a href="../index.php">⬅ Main Page</a>
    </div>

</div>

</body>
