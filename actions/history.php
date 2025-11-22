<?php
require_once '../config/db-connection.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

$user_id = $_SESSION['user']['id'];
$month = isset($_GET['month']) ? (int)$_GET['month'] : (int)date('m');
$year = date('Y'); 


$query = "SELECT date, check_in_time, check_out_time, status FROM attendance_history WHERE user_id = ? AND MONTH(date) = ? AND YEAR(date) = ? ORDER BY date DESC";
$stmt = $connection->prepare($query);
$stmt->bind_param('iii', $user_id, $month, $year);
$stmt->execute();
$result = $stmt->get_result();

$history = [];
$summary = ['Presence' => 0, 'Absence permit' => 0, 'Absence' => 0];
while ($row = $result->fetch_assoc()) {
    $history[] = $row;
    $summary[$row['status']]++;
}

$stmt->close();
?>
