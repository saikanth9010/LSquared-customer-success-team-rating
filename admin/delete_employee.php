<?php
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $employee_id_delete = $_POST["employee_id_delete"];

    $conn = new mysqli("localhost", "root", "", "employee_ratings");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM employees WHERE id = $employee_id_delete";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php"); // Redirect back to the admin page
        exit();
    } else {
        echo "Error deleting employee: " . $conn->error;
    }

    $conn->close();
}
?>
