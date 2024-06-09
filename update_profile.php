<?php
// File: update_profile.php
// Verifikasi apakah pengguna telah login sebelum mengakses halaman ini
session_start();
if (!isset($_SESSION['pembeli'])) {
    header('Location: login.php');
    exit();
}

// Mengambil informasi pengguna dari session
$user = $_SESSION['pembeli'];

// Proses pembaruan profil
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang dikirimkan melalui form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Update informasi pengguna
    $user['name'] = $name;
    $user['email'] = $email;
    $user['phone'] = $phone;
    $user['alamat'] = $alamat;

    // Simpan informasi pengguna ke session
    $_SESSION['pembeli'] = $user;

    // Redirect ke halaman profil dengan pesan sukses
    header('Location: profile.php?success=true');
    exit();
}
?>
