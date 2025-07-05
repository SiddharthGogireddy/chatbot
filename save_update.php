<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $message = trim($_POST['message']);

    if (!empty($title) && !empty($message)) {
        $stmt = mysqli_prepare($conn, "INSERT INTO updates (title, message, posted_on) VALUES (?, ?, NOW())");
        mysqli_stmt_bind_param($stmt, "ss", $title, $message);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    // ✅ Redirect to homepage after saving
    header("Location: index.php");
    exit();
}
?>
