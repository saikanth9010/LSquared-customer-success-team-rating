<?php
session_start();

// Replace with your actual admin username and password
$admin_username = "admin";
$admin_password = "admin123";

if (
    isset($_POST['username']) &&
    isset($_POST['password']) &&
    $_POST['username'] === $admin_username &&
    $_POST['password'] === $admin_password
) {
    $_SESSION['admin'] = true;
    header("Location: .");
    exit();
} else {
    header("Location: ./admin_login/index.php");
    exit();
}
