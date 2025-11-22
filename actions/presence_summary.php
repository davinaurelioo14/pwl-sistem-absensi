<?php
require_once __DIR__ . '/../config/db-connection.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

$user_id = $_SESSION['user']['id'];
$currentMonth = (int)date('m');
$currentYear = (int)date('Y');
$previousMonth = $currentMonth - 1;
$previousYear = $currentYear;
if ($previousMonth == 0) {
    $previousMonth = 12;
    $previousYear = $currentYear - 1;
}

function getMonthlySummary($connection, $user_id, $month, $year) {
    $query = "SELECT status, COUNT(*) as count FROM attendance_history WHERE user_id = ? AND MONTH(date) = ? AND YEAR(date) = ? GROUP BY status";
    $stmt = $connection->prepare($query);
    $stmt->bind_param('iii', $user_id, $month, $year);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $summary = ['Presence' => 0, 'Absence permit' => 0, 'Absence' => 0];
    while ($row = $result->fetch_assoc()) {
        $summary[$row['status']] = $row['count'];
    }
    $stmt->close();
    return $summary;
}

$currentSummary = getMonthlySummary($connection, $user_id, $currentMonth, $currentYear);
$previousSummary = getMonthlySummary($connection, $user_id, $previousMonth, $previousYear);

$months = [
    1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
    5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
    9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
];
$currentMonthName = $months[$currentMonth];
$previousMonthName = $months[$previousMonth];
?>
