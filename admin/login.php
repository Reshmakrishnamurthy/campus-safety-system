<?php
include "config.php";

if (isset($_POST['login'])) {
    $pin = $_POST['pin'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE pin=?");
    $stmt->bind_param("s", $pin);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid PIN";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Admin Login</title>
</head>
<body class="bg">

<div class="card">
<h2>Admin Login</h2>
<form method="POST">
<input type="password" name="pin" placeholder="6-digit PIN" required>
<button name="login">Login</button>
</form>
<p class="error"><?php echo $error ?? ""; ?></p>
</div>

</body>
</html>
