<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['admin'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: ./admin_login/");
    exit();
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: ./admin_login/");
    exit();
}
?>
