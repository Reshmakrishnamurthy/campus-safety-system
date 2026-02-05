<?php include("../backend/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
<title>Safety Procedures</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

<h3>Emergency Procedures</h3>

<?php
$res = $conn->query("SELECT * FROM safety_procedures");
while($p = $res->fetch_assoc()):
?>
<div class="card mb-2 p-2">
<b><?= $p['title'] ?></b>
<p><?= $p['description'] ?></p>
</div>
<?php endwhile; ?>

<h3>MMU Cyberjaya Map</h3>
<iframe 
src="https://www.google.com/maps?q=Multimedia%20University%20Cyberjaya&output=embed"
width="100%" height="400">
</iframe>

</body>
</html>
