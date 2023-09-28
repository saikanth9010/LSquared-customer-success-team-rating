<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Customer Success Team Ratings</title>
    <link rel="shortcut icon" type="image/x-icon" href="logo.jpg" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="navbar">
        <img src="logo.jpg" alt="Logo" class="logo">
        <div class="name">Reward Program</div>
        <a href="index.php" class="home-button">Home</a>
        <!-- <a href="logout.php" class="logout-button">Logout</a> Add this line -->
    </div>
    <h1>Customer Success Team Ratings</h1>
    <div class="employee-ratings">
        <?php
        // Establish a database connection
        $conn = new mysqli("localhost", "root", "", "employee_ratings");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch employee data from the database
        $sql = "SELECT * FROM employees";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="employee">';
                echo '<h2>' . $row["name"] . '</h2>';
                echo '<div class="star-rating">';
                
                // Loop to create star ratings based on the rating from the database
                for ($i = 1; $i <= 5; $i++) {
                    $active = ($i <= $row["rating"]) ? 'active' : '';
                    echo '<span class="star ' . $active . '">&#9733;</span>';
                }
                
                echo '</div>';
                echo '<p>Rating: ' . $row["rating"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "No employees found.";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>

    <script src="scripts.js"></script>
</body>
</html>
<?php
header("refresh: 5;");
?>
