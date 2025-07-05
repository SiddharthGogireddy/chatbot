<?php
include 'config.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password

    // Check if username or email already exists
    $check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Account already exists
        echo "<script>alert('Account already exists! Please log in.'); window.location='login.php';</script>";
    } else {
        // Insert new user into database
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Account created successfully! You can now log in.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Error creating account! Try again.'); window.location='signup.php';</script>";
        }
    }
}
?>
