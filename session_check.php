<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in'])) {
    header('Location: login1.php'); // Redirect to login page if not logged in
exit();
}
?>
