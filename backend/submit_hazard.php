<?php
include "db.php";

$description = $_POST['description'];
$location = $_POST['location'];

$photoName = "";
if (!empty($_FILES['photo']['name'])) {
    $photoName = time() . "_" . $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/uploads/" . $photoName);
}

$conn->query("INSERT INTO hazards (description, photo, location)
              VALUES ('$description', '$photoName', '$location')");

header("Location: ../staff/dashboard.php");
exit();
?>
