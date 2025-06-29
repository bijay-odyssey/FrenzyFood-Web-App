<?php
// login.php
include '../../config/db.php';
include '../../controllers/AuthController.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $message = loginUser($conn, $username, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <form action="" method="POST">
        <h2>Login</h2>
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>

    <?php if ($message) echo "<p>$message</p>"; ?>

    <div>
        <a href="register.php">Register</a>
    </div>
</body>
</html>
