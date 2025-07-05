<?php
session_start();
include 'config.php';

// Check if admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $update_id = intval($_GET['id']);
    $stmt = mysqli_prepare($conn, "DELETE FROM updates WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $update_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Redirect back
header("Location: index.php");
exit();
?>
