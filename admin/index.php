<?php
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin'])) {
    header("Location: ./admin_login/");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="shortcut icon" type="image/x-icon" href="../logo.jpg" />
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<div class="navbar">
        <img src="../logo.jpg" alt="Logo" class="logo">
        <div class="name">Reward Program</div>
        <a href="index.php" class="home-button">Home</a>
        <a href="logout.php" class="logout-button">Logout</a> <!-- Add this line -->
    </div>
    <h1>Customer Success Team Ratings</h1>
    <h2>Change Employee Ratings</h2>
    <form action="update_rating.php" method="post">
        <label for="employee_id">Select Employee:</label>
        <select name="employee_id" id="employee_id">
            <?php
            // Retrieve employee names and IDs from the database
            $conn = new mysqli("localhost", "root", "", "employee_ratings");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, name FROM employees";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                }
            }

            $conn->close();
            ?>
        </select>
        <br><br>
        <label for="new_rating">New Rating:</label>
        <input type="number" name="new_rating" id="new_rating" step="0.1" min="1" max="5" required>
        <br><br>
        <input type="submit" value="Update Rating">
    </form>
    <h2>Add Employee</h2>
    <form action="add_employee.php" method="post">
        <label for="employee_name">Employee Name:</label>
        <input type="text" name="employee_name" id="employee_name" required>
        <br>
        <br>
        <input type="submit" value="Add Employee">
    </form>
    <h2>Delete Employee</h2>
    <form action="delete_employee.php" method="post">
        <label for="employee_id_delete">Select Employee to Delete:</label>
        <select name="employee_id_delete" id="employee_id_delete">
            <?php
            // Retrieve employee names and IDs from the database
            $conn = new mysqli("localhost", "root", "", "employee_ratings");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, name FROM employees";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                }
            }

            $conn->close();
            ?>
        </select>
        <br><br>
        <input type="submit" value="Delete Employee">
    </form>
    <h2>Update Employee Details</h2>
    <form action="update_employee.php" method="post">
        <label for="employee_id_update">Select Employee to Update:</label>
        <select name="employee_id_update" id="employee_id_update">
            <?php
            // Retrieve employee names and IDs from the database
            $conn = new mysqli("localhost", "root", "", "employee_ratings");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, name FROM employees";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                }
            }

            $conn->close();
            ?>
        </select>
        <br><br>
        <label for="new_employee_name">New Employee Name:</label>
        <input type="text" name="new_employee_name" id="new_employee_name" required>
        <br><br>
        <!-- <label for="new_employee_rating">New Employee Rating:</label>
        <input type="number" name="new_employee_rating" id="new_employee_rating" step="0.1" min="1" max="5" required>
        <br><br> -->
        <input type="submit" value="Update Employee">
    </form>

</body>
</html>
