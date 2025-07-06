<?php
session_start();

// Function to check if user is authenticated
function isAuthenticated() {
    return isset($_SESSION['user_id']) && isset($_SESSION['email']) && isset($_SESSION['username']);
}

// Redirect to login if not authenticated
function requireLogin() {
    if (!isAuthenticated()) {
        header("Location: login.php");
        exit();
    }
}
?>