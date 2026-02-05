<?php
session_start();  // Start the session
session_destroy(); // Destroy all session data

// Redirect to front page with role selection
header("Location: ../index.php");
exit();
