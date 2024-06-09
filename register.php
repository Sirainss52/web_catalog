<?php
session_start();
include("db_conn.php");

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['alamat']) && isset($_POST['phone'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $phone = $_POST['phone'];

    $query = "INSERT INTO user (nama_pembeli, email, password, alamat) VALUES ('$username', '$email', '$password', '$alamat','$phone')";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "Registration successful. You can now login.";
    }else{
        echo "Registration failed. Please try again.";
    }
}
?>
