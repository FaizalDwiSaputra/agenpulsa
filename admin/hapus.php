<?php
include "../koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk = '$id'");
echo "<script>location='index.php?halaman=produk';</script>";
?>