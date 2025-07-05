<?php
include 'config.php'; // Include database connection

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check credentials in the database
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to dashboard after login
    } else {
        echo "<script>alert('Invalid Credentials!'); window.location='login.php';</script>";
    }
}
?>
