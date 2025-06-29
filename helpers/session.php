<?php
session_start();  

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function hasRole($role) {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === $role; // Change from 'role' to 'user_role'
}

function requireRole($role) {
    if (!hasRole($role)) {
        header("Location: ../auth/login.php");
        exit;
    }
}

function requireAdmin() {
    requireRole('admin'); // Use 'admin' if that’s the role you defined
}

function requireFoodCustomer() {
    requireRole('customer'); // Use 'customer'
}

function requireDeliveryPerson() {
    requireRole('delivery_person'); // Use 'delivery_person' based on your ENUM definition
}

function requireRestaurantOwner() {
    requireRole('restaurant_owner'); // Use 'restaurant_owner'
}

function sessionDestroy() {
    $_SESSION = [];
    session_destroy();
}
?>
