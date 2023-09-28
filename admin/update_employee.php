<?php
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $employee_id_update = $_POST["employee_id_update"];
    $new_employee_name = $_POST["new_employee_name"];
    

    $conn = new mysqli("localhost", "root", "", "employee_ratings");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE employees SET name = '$new_employee_name' WHERE id = $employee_id_update";

    if ($conn->query($sql) === TRUE) {
        header("Location: ."); // Redirect back to the admin page
        exit();
    } else {
        echo "Error updating employee details: " . $conn->error;
    }

    $conn->close();
}
?>
