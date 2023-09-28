<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="../../logo.jpg" />
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>
<div class="navbar">
        <img src="../../logo.jpg" alt="Logo" class="logo">
        <div class="name">Reward Program</div>
        <a href="index.php" class="home-button">Home</a>
        <!-- <a href="logout.php" class="logout-button">Logout</a> Add this line -->
    </div>
    <div class="banner">
    <h1>Customer Success Team Ratings</h1>
        <h2>Lsquared Reward Program - Admin Login</h2>
    </div>
    <h2>Admin Login</h2>
    <form action="../admin_auth.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
