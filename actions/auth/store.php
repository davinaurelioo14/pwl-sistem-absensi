<?php
require_once '../../config/db-connection.php';

if (isset($_POST['store'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $passwordHashed = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ? )";

    $stmt = $connection->prepare($query);
    $stmt->bind_param('sss', $name, $email, $passwordHashed);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $stmt->close();
        header('Location: ../../pwl-sistem-absensi/homepage.php');
        exit();
    } else {
        echo 'Error to store user: ' . $stmt->error;
    }
}
?>