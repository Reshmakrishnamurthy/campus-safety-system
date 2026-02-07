<!DOCTYPE html>
<html>
<head>
<title>MMU Visitor Registration</title>
<link rel="stylesheet" href="../assets/css/style1.css">
</head>
<body>
   
<header>VISITOR SYSTEM</header>

<nav>
    <a href="index.php">REGISTER</a>

    <?php if (isset($_SESSION['visitor_registered'])) { ?>
        <a href="map.php">CAMPUS MAP</a>
        <a href="emergency.php">EMERGENCY</a>
        <a href="logout.php" style="color:red;">LOGOUT</a>
    <?php } ?>
</nav>

    
<div class="container">
<h2>Visitor Registration</h2>

<form method="POST" action="register.php">
<input type="text" name="name" placeholder="Full Name" required>
<input type="text" name="phone" placeholder="Phone Number" required>
<input type="email" name="email" placeholder="Email" required>
<textarea name="purpose" placeholder="Purpose of Visit" required></textarea>
<button type="submit">Register</button>
</form>
<br>
    <a href="../index.php" class="back-button">⬅ Back to Role Selection</a>
</div>
</body>
</html>
