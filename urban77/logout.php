<?php
session_start();
session_destroy(); // Destroy the session and all session data

header("Location: index.html"); // Redirect to the login page
exit();
?>