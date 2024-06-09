<?php 
session_start();
$_SESSION['pembeli'] = "";
$_SESSION['email'] = "";
session_destroy();

header("location:login.php");