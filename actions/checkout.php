<?php
require_once '../config/db-connection.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

$user_id = $_SESSION['user']['id'];
$date = date('Y-m-d');
$time = date('Y-m-d H:i:s');
$status = isset($_POST['status']) ? $_POST['status'] : 'Presence';


$queryCheck = "SELECT * FROM attendance_history WHERE user_id = ? AND date = ? AND check_in_time IS NOT NULL AND check_out_time IS NULL";
$stmtCheck = $connection->prepare($queryCheck);
$stmtCheck->bind_param('is', $user_id, $date);
$stmtCheck->execute();
$resultCheck = $stmtCheck->get_result();

if ($resultCheck->num_rows > 0) {
    $queryUpdate = "UPDATE attendance_history SET check_out_time = ?, status = ? WHERE user_id = ? AND date = ? AND check_out_time IS NULL";
    $stmtUpdate = $connection->prepare($queryUpdate);
    $stmtUpdate->bind_param('ssis', $time, $status, $user_id, $date);
    $stmtUpdate->execute();
    echo "<script>alert('Check-out successful.'); window.location.href = '../pwl-sistem-absensi/homepage.php';</script>";
} else {
    echo "<script>alert('You have not checked in today or already checked out.'); window.location.href = '../pwl-sistem-absensi/homepage.php';</script>";
}

$stmtCheck->close();
?>
