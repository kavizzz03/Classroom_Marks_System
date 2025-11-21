<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Prevent back button after logout
header("Cache-Control: no-cache, must-revalidate");
header("Expires: 0");

// Redirect to login page (change login.php if needed)
header("Location: admin_login.php");
exit();
?>
