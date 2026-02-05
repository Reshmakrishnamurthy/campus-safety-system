<?php
session_start();

// Session timeout: 15 minutes
$timeout_duration = 900;

if (isset($_SESSION['LAST_ACTIVITY']) && 
    (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: logout.php");
    exit();
}

$_SESSION['LAST_ACTIVITY'] = time();
?>
