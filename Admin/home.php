<?php
session_start();
include 'db_conn.php';

if (!isset($_SESSION['admin'])) {
  echo "<script>alert('Anda harus login terlebih dahulu');</script>";
  echo "<script>location='login.php';</script>";
  header('location:login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>Admin-tokoYUGHAN</title>
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5fdf087659.js" crossorigin="anonymous"></script>
  <script src="assets/js/ie-emulation-modes-warning.js"></script>
  <link rel="stylesheet" type="text/css" href="dashboard.css">

</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Admin TokoYUGHAN</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../index.php">HOME</a></li>
          <li><a href="#">SERVICES</a></li>
          <li><a href="$">ABOUT</a></li>
          <li><a href="#">CONTACT US</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <li><a href="home.php"><i class="fa fa-book"> dashboard</i></a></li>
          <li><a href="home.php?halaman=kategori"><i class="fa fa-cube"> kategori</i></a></li>
          <li><a href="home.php?halaman=produk"><i class="fa fa-tags"> Produk </i></a></li>
          <li><a href="home.php?halaman=logout"><i class="fa fa-sign-out"> logout</i></a></li>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php
        if (isset($_GET['halaman'])) {
          if ($_GET['halaman'] == "produk") {
            include 'produk.php';
          }  elseif ($_GET['halaman'] == "pengiriman") {
            include 'pengiriman.php';
          } elseif ($_GET['halaman'] == "detail") {
            include 'detail.php';
          } elseif ($_GET['halaman'] == "tambah_produk") {
            include 'tambah_produk.php';
          } elseif ($_GET['halaman'] == "hapus_produk") {
            include 'hapus_produk.php';
          } elseif ($_GET['halaman'] == "ubah_produk") {
            include 'ubah_produk.php';
          } elseif ($_GET['halaman'] == "logout") {
            include 'logout.php';
          } elseif ($_GET['halaman'] == "kategori") {
            include 'kategori.php';
          }

        } else {
          include 'home-admin.php';
        }
        ?>

</html>