<?php
require_once '../../config/db-connection.php';
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if(isset($user)) {
        //jika pengguna ditemukan
        $isPasswordMatching = password_verify ($password, $user['password']);

        if($isPasswordMatching) {
            //jika kata sandi cocok
            session_regenerate_id(true);
            $_SESSION['user'] = $user;

            header("Location: ../../pwl-sistem-absensi/homepage.php");
            exit;
        } else {
            //jika kata sandi tidak cocok
            echo "
        <script>
            alert('Email tidak ditemukan!');
            window.location.href = '../../index.php';
        </script>
        ";
        }
    } else {
        //jika pengguna tidak ditemukan
        echo "
        <script>
            alert('Email tidak ditemukan!');
            window.location.href = '../../index.php';
        </script>
        ";
    }
}
?>