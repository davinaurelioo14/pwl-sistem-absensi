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

$queryCheck = "SELECT * FROM attendance_history WHERE user_id = ? AND date = ?";
$stmtCheck = $connection->prepare($queryCheck);
$stmtCheck->bind_param('is', $user_id, $date);
$stmtCheck->execute();
$resultCheck = $stmtCheck->get_result();

if ($resultCheck->num_rows > 0) {
    $row = $resultCheck->fetch_assoc();
    if ($row['check_in_time'] !== null) {
        echo "<script>alert('You have already checked in today.'); window.location.href = '../pwl-sistem-absensi/homepage.php';</script>";
        exit();
    }
   
    $queryUpdate = "UPDATE attendance_history SET check_in_time = ?, status = ? WHERE user_id = ? AND date = ?";
    $stmtUpdate = $connection->prepare($queryUpdate);
    $stmtUpdate->bind_param('ssis', $time, $status, $user_id, $date);
    $stmtUpdate->execute();
    echo "<script>alert('Check-in successful.'); window.location.href = '../pwl-sistem-absensi/homepage.php';</script>";
} else {
 
    $queryInsert = "INSERT INTO attendance_history (user_id, check_in_time, date, status) VALUES (?, ?, ?, ?)";
    $stmtInsert = $connection->prepare($queryInsert);
    $stmtInsert->bind_param('isss', $user_id, $time, $date, $status);
    $stmtInsert->execute();
    echo "<script>alert('Check-in successful.'); window.location.href = '../pwl-sistem-absensi/homepage.php';</script>";
}

$stmtCheck->close();
?>
