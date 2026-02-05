<?php
include "backend/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);

    if (!empty($title)) {
        $stmt = $conn->prepare(
            "INSERT INTO complaints (title, status, created_at) VALUES (?, 'Pending', NOW())"
        );
        $stmt->bind_param("s", $title);
        $stmt->execute();

        header("Location: index.php?success=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Complaint</title>
    <link rel="stylesheet" href="style.css">
    <head>
    <title>Create Complaint</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body.bg {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: url("admin/background.jpg") no-repeat center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 480px;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: black;
            font-size: 32px;
            text-shadow: 0 4px 10px rgba(0,0,0,0.4);
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 20px 45px rgba(0,0,0,0.3);
        }

        label {
            font-weight: 600;
            color: #1F2937;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 14px;
            font-size: 15px;
            border-radius: 10px;
            border: 1px solid #D1D5DB;
            outline: none;
            transition: 0.3s;
        }

        input[type="text"]:focus {
            border-color: #6366F1;
            box-shadow: 0 0 0 3px rgba(99,102,241,0.25);
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            font-size: 16px;
            font-weight: 700;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            color: #fff;
            background: linear-gradient(90deg, #2563EB, #7C3AED);
            transition: 0.3s;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        .back-link {
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            font-weight: 600;
            color: black;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

</head>
<body class="bg">

<div class="container">

    <!-- Back Button -->
    <<a href="index.php" class="back-link">Back to Home</a>

    </a>

    <h2>📝 Create Complaint</h2>

    <form method="POST" class="card">
        <label>Complaint </label>
        <input type="text" name="title" required>

        <br><br>

        <button type="submit">Submit Complaint</button>
    </form>

</div>

</body>
</html>
