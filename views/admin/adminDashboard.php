<?php
require_once '../../helpers/session.php';  
requireAdmin();  
 
$username = isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'User';

 
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Welcome, <?php echo $username; ?>, to admin dashboard</h1>
<a href="../auth/logout.php">Logout</a>


</body>
</html>