<?php
session_start();
include 'includes/db.php';

if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
    mysqli_query($conn, "INSERT INTO activity_logs (user_id, activity_type) VALUES ('$uid', 'logout')");
}

session_destroy();
header("Location: login.php");
exit();
?>