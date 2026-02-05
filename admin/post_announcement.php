<?php
include "config.php";
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['publish'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare(
        "INSERT INTO announcements (title, content) VALUES (?, ?)"
    );
    $stmt->bind_param("ss", $title, $content);

    if ($stmt->execute()) {
        $success = "Announcement posted successfully!";
    } else {
        $error = "Failed to post announcement";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Post Announcement</title>
</head>
<body class="bg">

<div class="card">
<h2>Post Announcement</h2>

<p class="success"><?php echo $success ?? ""; ?></p>
<p class="error"><?php echo $error ?? ""; ?></p>

<form method="POST">
<input type="text" name="title" placeholder="Title" required>
<textarea name="content" placeholder="Content" required></textarea>
<button name="publish">Publish</button>
</form>

<a href="dashboard.php">⬅ Back</a>
</div>

</body>
</html>
