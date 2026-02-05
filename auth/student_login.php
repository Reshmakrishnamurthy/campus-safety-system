<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../backend/db1.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['student_id'];
    $pw = $_POST['password'];

    $q = $conn->query("SELECT * FROM students WHERE student_id='$id'");
    if ($q->num_rows == 1) {
        $s = $q->fetch_assoc();

        if ($s['lock_until'] && strtotime($s['lock_until']) > time()) {
            die("Account locked for 30 minutes");
        }

        if ($pw == $s['password']) {
            $conn->query("UPDATE students SET failed_attempts=0, lock_until=NULL WHERE student_id='$id'");
            $_SESSION['student_id'] = $id;
            header("Location: ../student/dashboard.php");
            exit;
        } else {
            $fail = $s['failed_attempts'] + 1;
            if ($fail >= 3) {
                $lock = date("Y-m-d H:i:s", strtotime("+30 minutes"));
                $conn->query("UPDATE students SET failed_attempts=$fail, lock_until='$lock' WHERE student_id='$id'");
            } else {
                $conn->query("UPDATE students SET failed_attempts=$fail WHERE student_id='$id'");
            }
            echo "Invalid login";
        }
    } else {
        echo "Student not found";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/style.css" rel="stylesheet">
</head>

<body>
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card p-4 col-md-4">
        <h3 class="text-center mb-3">🎓 Student Login</h3>

        <form method="POST">
            <input class="form-control mb-3" name="student_id" placeholder="Student ID" required>
            <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
            <button class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
</body>
</html>
