<?php

include '../../config/db.php';
include '../../controllers/AuthController.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = registerUser($conn, $_POST, $_FILES);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <h2>Register</h2>
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number"><br>
        
        <label for="address">Address:</label>
        <textarea name="address"></textarea><br>
        
        <label for="user_role">User Role:</label>
        <select name="user_role" id="user_role" onchange="toggleRestaurantFields()">
        <option value="customer" selected>Food Customer</option>
        <option value="restaurant_owner">Restaurant Owner</option>
        <option value="delivery_person">Delivery Person</option>
        <option value="admin">Admin</option>
        </select><br>

        <div id="restaurant_fields" style="display:none;">
            <h3>Restaurant Details</h3>
            <label for="restaurant_name">Restaurant Name:</label>
            <input type="text" name="restaurant_name"><br>
            
            <label for="restaurant_address">Restaurant Address:</label>
            <textarea name="restaurant_address"></textarea><br>
            
            <label for="restaurant_phone_number">Restaurant Phone Number:</label>
            <input type="text" name="restaurant_phone_number"><br>
            
            <label for="restaurant_email">Restaurant Email:</label>
            <input type="email" name="restaurant_email"><br>
            
            <label for="restaurant_image">Restaurant Image:</label>
            <input type="file" name="restaurant_image" accept="image/*"><br>
        </div>

        <label for="profile_image">Profile Image:</label>
        <input type="file" name="profile_image" accept="image/*"><br>

        <input type="submit" value="Register">
    </form>

    <?php if ($message) echo "<p>$message</p>"; ?>
 
    <div>
        <a href="login.php">Login</a>
    </div>

    <script>
        function toggleRestaurantFields() {
            const userRole = document.getElementById('user_role').value;
            document.getElementById('restaurant_fields').style.display = userRole === 'restaurant_owner' ? 'block' : 'none';
        }
    </script>

    
</body>
</html>
