<?php
$servername = "localhost";
$username = "adityaAdmin"; // Change this if needed
$password = "ErvinRommel123"; // Your database password
$dbname = "careersdb"; // Change to your database name

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
