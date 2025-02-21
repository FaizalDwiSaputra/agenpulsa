<?php
$local = 'localhost';
$user = 'root';
$pw = '';
$db = 'pulsa';
$koneksi = mysqli_connect($local, $user, $pw, $db);


if(!$koneksi){
    echo "Tidak terhubung";
}
?>