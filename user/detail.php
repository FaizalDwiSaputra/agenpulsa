<?php
session_start();

if(!isset($_SESSION['pengguna'])){
    echo "<script>alert('Silahkan login dahulu');</script>";
    echo "<script>location='login.php';</script>";
}
include "../koneksi.php";

$id = $_GET['id'];
$tampil = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN produk ON transaksi.id_produk = produk.id_produk WHERE id_transaksi = '$id'");
$pecah = mysqli_fetch_assoc($tampil);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
       .full-kontainer{
            width: 70%;
            margin: 0 auto;
        }
        .login-daftar a{
            text-decoration: none;
        }
        .logout {
            text-decoration: none;
        }
        span{
            color: orange;
        }
        .kartu{
            box-shadow: 0px 3px 7px rgba(0,0,0,0.1);
            height: 200px;
            border-radius: 20px;
        }
        .orang{
            border: none;
            background-color: transparent;
            font-size: 20px;
        }
    
    </style>
  </head>
  <body>
    <div class="full-kontainer">
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse  justify-content-between" id="navbarNavAltMarkup">
            <div class="navbar-nav ">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="../index.php?#produk">Produk</a>
              <a class="nav-link" href="#">Cek Pesanan</a>
            </div>
            <?php if(isset($_SESSION['pengguna'])): ?>
            <div class="bungkus-logout">
            <a href="../logout.php" class="logout">Logout</a>
            <button class="orang bi bi-person-circle position-relative">
                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
            </button>
            </div>
            <?php else :?>
            <div class="navbar-nav justify-content-end login-daftar">
                <a href="./user/login.php" class="mx-md-4 my-3 my-md-0">Login</a>
                <a href="" >Daftar</a>
            </div>
            <?php endif ?>
          </div>
        </div>
      </nav>
    
    <!--  -->
    <div>
        <h3 class="my-3">Hallo, Selamat datang kembali <span><?php echo $_SESSION['pengguna']['nama_pengguna'];?></span></h3>
    </div>
    <div class="kontainer">
        <div class="row">
            <div class="col-md-4">
                <div class="kartu p-4">
                <h4>Informasi Pengguna</h4>
                <p>Nama     : <strong><?php echo $_SESSION['pengguna']['nama_pengguna']; ?></strong></p>
                <p>Telepon  : <strong><?php echo $_SESSION['pengguna']['telepon_pengguna'];?></strong></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="kartu p-4">
                <h4>Informasi produk</h4>
                <p>Provider     : <strong><?php echo $pecah['nama_provider'];?></strong></p>
                <p>Nominal      : <strong><?php echo $pecah['nominal'];?></strong></p>
                <p>Total        : <strong><?php echo $pecah['total'];?></strong></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="kartu p-4">
                <h4>Status</h4>
                <p class="badge text-bg-warning"><?php echo $pecah['status_pembelian'];?></p>
                <p>No telepon yang diisi : <?php echo $pecah['telepon'];?></p>
                </div>
            </div>
        </div>
    </div>
    <!--  -->


    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>