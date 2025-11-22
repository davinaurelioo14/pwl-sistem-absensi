<?php
require_once 'config/db-connection.php';

$query = 'INSERT INTO users (name, email, password) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE name=VALUES(name), password=VALUES(password)';
$stmt = $connection->prepare($query);
$name = 'Test User';
$email = 'test@example.com';
$password = password_hash('password', PASSWORD_DEFAULT);
$stmt->bind_param('sss', $name, $email, $password);
$stmt->execute();
$user_id = $connection->insert_id;
if ($user_id == 0) {
    $query = 'SELECT id FROM users WHERE email = ?';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $user_id = $user['id'];
}
echo 'User inserted or updated. ID: ' . $user_id . PHP_EOL;

$currentMonth = (int)date('m');
$currentYear = (int)date('Y');
$prevMonth = $currentMonth - 1;
$prevYear = $currentYear;
if ($prevMonth == 0) {
    $prevMonth = 12;
    $prevYear = $currentYear - 1;
}

for ($day = 1; $day <= 5; $day++) {
    $date = sprintf('%04d-%02d-%02d', $currentYear, $currentMonth, $day);
    $checkIn = sprintf('%04d-%02d-%02d 07:00:00', $currentYear, $currentMonth, $day);
    $checkOut = sprintf('%04d-%02d-%02d 14:00:00', $currentYear, $currentMonth, $day);
    $status = 'Presence';
    $query = 'INSERT INTO attendance_history (user_id, date, check_in_time, check_out_time, status) VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE check_in_time=VALUES(check_in_time), check_out_time=VALUES(check_out_time), status=VALUES(status)';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('sssss', $user_id, $date, $checkIn, $checkOut, $status);
    $stmt->execute();
}
echo 'Sample attendance data inserted for current month.' . PHP_EOL;

for ($day = 1; $day <= 3; $day++) {
    $date = sprintf('%04d-%02d-%02d', $prevYear, $prevMonth, $day);
    $checkIn = sprintf('%04d-%02d-%02d 07:00:00', $prevYear, $prevMonth, $day);
    $checkOut = sprintf('%04d-%02d-%02d 14:00:00', $prevYear, $prevMonth, $day);
    $status = 'Presence';
    $query = 'INSERT INTO attendance_history (user_id, date, check_in_time, check_out_time, status) VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE check_in_time=VALUES(check_in_time), check_out_time=VALUES(check_out_time), status=VALUES(status)';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('sssss', $user_id, $date, $checkIn, $checkOut, $status);
    $stmt->execute();
}
echo 'Sample attendance data inserted for previous month.' . PHP_EOL;
?>
