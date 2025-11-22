<?php
session_start();
$_SESSION['user']['id'] = 32;
require_once 'actions/presence_summary.php';
echo 'Current Month: ' . $currentMonthName . PHP_EOL;
echo 'Presence: ' . $currentSummary['Presence'] . PHP_EOL;
echo 'Absence permit: ' . $currentSummary['Absence permit'] . PHP_EOL;
echo 'Absence: ' . $currentSummary['Absence'] . PHP_EOL;
echo 'Previous Month: ' . $previousMonthName . PHP_EOL;
echo 'Presence: ' . $previousSummary['Presence'] . PHP_EOL;
echo 'Absence permit: ' . $previousSummary['Absence permit'] . PHP_EOL;
echo 'Absence: ' . $previousSummary['Absence'] . PHP_EOL;
?>
