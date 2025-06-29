<?php
require_once '../../helpers/session.php'; 
requireDeliveryPerson();


$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User';
$profile_image = isset($_SESSION['profile_image']) ? htmlspecialchars($_SESSION['profile_image']) : '../../assets/images/default-profile.png'; // Default image if none is set

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        img {
            border-radius: 50%;
            width: 100px; /* Set the desired width */
            height: 100px; /* Set the desired height */
        }
    </style>
</head>
<body>
<h1>Welcome, <?php echo $username; ?>, to your dashboard</h1>

<!-- Display profile image -->
<img src="<?php echo $profile_image; ?>" alt="Profile Image">

<a href="../auth/logout.php">Logout</a>
</body>
</html>
