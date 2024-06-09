<?php

$take = $conn->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $take->fetch_assoc();
$fotoproduk = $pecah['foto_produk'];
if (file_exists("./foto_produk/".$fotoproduk))
{
    unlink("./foto_produk/".$fotoproduk);
}

$conn->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

echo "<script>alert('produk terhapus');</script>";
echo "<script>location='home.php?halaman=produk';</script>";

?>