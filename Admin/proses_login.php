<?php
session_start();
include 'db_conn.php';
$user = $_POST['username'];
$pass = $_POST['password'];
$data = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user'");
$row = mysqli_fetch_array($data);
if (password_verify($pass, $row['password'])) {
    if (mysqli_num_rows($data) > 0) {
        echo "Login Berhasil";
        header('Location: home.php.');

    }
} else {

    header('Location: login-bydosen.php');
}
?>