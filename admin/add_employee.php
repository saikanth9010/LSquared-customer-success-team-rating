<?php
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $employee_name = $_POST["employee_name"];

    $conn = new mysqli("localhost", "root", "", "employee_ratings");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO employees (name, rating) VALUES ('$employee_name', 3.0)";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php"); // Redirect back to the admin page
        exit();
    } else {
        echo "Error adding employee: " . $conn->error;
    }

    $conn->close();
}
?>
