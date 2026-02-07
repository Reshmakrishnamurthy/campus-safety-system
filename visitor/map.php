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
    <title>MMU Cyberjaya Campus Map</title>
    <link rel="stylesheet" href="../assets/css/style1.css">
</head>
<body>

<header>MMU CYBERJAYA CAMPUS MAP</header>

<nav>
    <a href="index.php">REGISTER</a>

    <?php if (isset($_SESSION['visitor_registered'])) { ?>
        <a href="map.php">CAMPUS MAP</a>
        <a href="emergency.php">EMERGENCY</a>
        <a href="logout.php" style="color:red;">LOGOUT</a>
    <?php } ?>
</nav>

<div class="container">
    <h2>Select Campus Facility</h2>
    <p>
        Visitors can locate important facilities such as academic buildings,
        parking zones, cafeterias, libraries, administrative offices, and
        emergency points within MMU Cyberjaya.
    </p>

    <form method="GET">
        <select name="loc" required>
            <option value="">-- Select Location --</option>

            <optgroup label="Academic Buildings">
                <option value="2.92742,101.64195">Faculty of Computing & Informatics (FCI)</option>
                <option value="2.92790,101.64260">Faculty of Engineering (FOE)</option>
                <option value="2.92850,101.64130">Faculty of Creative Multimedia (FCM)</option>
            </optgroup>

            <optgroup label="Administrative Offices">
                <option value="2.92698,101.64180">Administration Building</option>
                <option value="2.92660,101.64240">Student Services & Admissions</option>
            </optgroup>

            <optgroup label="Library">
                <option value="2.92710,101.64090">MMU Library</option>
            </optgroup>

            <optgroup label="Cafeterias">
                <option value="2.92770,101.64050">MMU Cafeteria</option>
                <option value="2.92820,101.64110">Student Food Court</option>
            </optgroup>

            <optgroup label="Parking Zones">
                <option value="2.92650,101.64020">Main Parking Area</option>
                <option value="2.92890,101.64280">Staff Parking Zone</option>
            </optgroup>

            <optgroup label="Emergency Points">
                <option value="2.92730,101.64120">Emergency Assembly Point A</option>
                <option value="2.92690,101.64290">Campus Health Centre</option>
                <option value="2.92780,101.64010">Campus Security Office</option>
            </optgroup>
        </select>

        <br><br>
        <button type="submit">Show on Map</button>
    </form>

    <?php if (isset($_GET['loc'])) { ?>
        <h3>Selected Location</h3>
        <iframe
            width="100%"
            height="450"
            style="border-radius:10px;"
            src="https://maps.google.com/maps?q=<?php echo htmlspecialchars($_GET['loc']); ?>&z=17&output=embed">
        </iframe>
    <?php } ?>

    <br>
    <a href="../index.php" class="back-button">⬅ Back to Role Selection</a>
</div>

</body>
</html>
