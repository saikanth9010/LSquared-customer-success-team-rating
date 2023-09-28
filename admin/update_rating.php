<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $employeeId = $_POST["employee_id"];
    $rating = $_POST["new_rating"];

    $conn = new mysqli("localhost", "root", "", "employee_ratings");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE employees SET rating = $rating WHERE id = $employeeId";
    $result = $conn->query($sql);

    $conn->close();
  
}
?>

<?php

header('Location: .');

exit;

?>