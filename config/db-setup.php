<?php
require_once 'db-connection.php';

$queryCreateDB = "CREATE DATABASE IF NOT EXISTS $database";
if ($connection->query($queryCreateDB) === TRUE) {
    echo "Database created successfully or already exists.<br>";
} else {
    echo "Error creating database: " . $connection->error . "<br>";
}

$connection->select_db($database);

$queryUsers = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($connection->query($queryUsers) === TRUE) {
    echo "Users table created successfully or already exists.<br>";
} else {
    echo "Error creating users table: " . $connection->error . "<br>";
}

$queryAttendance = "CREATE TABLE IF NOT EXISTS attendance_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    check_in_time DATETIME,
    check_out_time DATETIME,
    status ENUM('Presence', 'Absence permit', 'Absence') DEFAULT 'Presence',
    date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";

if ($connection->query($queryAttendance) === TRUE) {
    echo "Attendance history table created successfully or already exists.<br>";
} else {
    echo "Error creating attendance history table: " . $connection->error . "<br>";
}

echo "Database setup completed.";
?>
