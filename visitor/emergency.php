<?php
session_start();
include 'includes/db_connect.php';

if (!isset($_SESSION['visitor_registered'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Emergency Instructions</title>
    <link rel="stylesheet" href="../assets/css/style1.css">
</head>
<body>
    <div class="page-overlay"></div>

    <header>EMERGENCY INSTRUCTIONS</header>

    <nav>
    <a href="index.php">REGISTER</a>

    <?php if (isset($_SESSION['visitor_registered'])) { ?>
        <a href="map.php">CAMPUS MAP</a>
        <a href="emergency.php">EMERGENCY</a>
        <a href="logout.php" style="color:red;">LOGOUT</a>
    <?php } ?>
</nav>


    <div class="container">
        <h2>Select Language</h2>

        <form method="GET">
            <select name="lang" required>
                <option value="">-- Select Language --</option>
                <?php 
                // Fetch all available languages from database
                $res = $conn->query("SELECT DISTINCT language FROM emergency_messages");
                while ($row = $res->fetch_assoc()) {
                    echo "<option value='".htmlspecialchars($row['language'])."'>".htmlspecialchars($row['language'])."</option>";
                }
                ?>
            </select>
            <br><br>
            <button type="submit">View Instructions</button>
        </form>

        <?php 
        if (isset($_GET['lang'])) {
            $lang = $_GET['lang'];
            $msg = $conn->query("SELECT message FROM emergency_messages WHERE language='".$conn->real_escape_string($lang)."'");
            if ($msg->num_rows > 0) {
                $row = $msg->fetch_assoc();
                echo "<p><strong>Instructions:</strong></p>";
                echo "<pre style='text-align:left; white-space:pre-wrap;'>"
                    . htmlspecialchars($row['message']) .
                    "</pre>";

            } else {
                echo "<p>No instructions available for this language.</p>";
            }
        }
        ?>

        <br>
        <!-- Back button to role selection front page -->
        <a href="../index.php" class="back-button">⬅ Back to Role Selection</a>
    </div>
</body>
</html>
