<?php
session_start();

if (!isset($_SESSION['pengguna'])){
  echo "<script>alert('Silahkan login dahulu');</script>";
  echo "<script>location='login.php';</script>";
}

include "../koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id'");
$pecah = mysqli_fetch_assoc($query);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./css/style.css">
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
        .orang{
            border: none;
            background-color: transparent;
            font-size: 20px;
        }
        .logout{
          text-decoration: none;
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
              <a class="nav-link" href="riwayat.php">Cek Pesanan</a>
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
                <a href="../logout.php" class="mx-md-4 my-3 my-md-0">Login</a>
                <a href="" >Daftar</a>
            </div>
            <?php endif ?>
          </div>
        </div>
      </nav>
    
      <!--  -->
      <div class="full-kontainer-bayar shadow-sm">
        <form action="" method="post" enctype="multipart/form-data" class="p-5">
            <div class="form-group">
              <label>Provider</label>
              <input type="text" class="form-control"  readonly value="<?php echo $pecah['nama_provider']; ?>">
            </div>

            <div class="form-group">
              <label>Nominal</label>
              <input type="text" class="form-control"  readonly value="<?php echo $pecah['nominal'];?>">
            </div>

            <div class="form-group">
              <label>Harga</label>
              <input type="text" name="harga" id="" class="form-control" readonly value="<?php echo $pecah['harga']; ?>">
            </div>

            <div class="form-group">
              <label>No Telepon</label>
              <input type="text" name="telepon" placeholder="Masukkan Nomer Telepon" class="form-control">
            </div>

            <div class="form-group mt-2">
              <label>Kirim bukti</label>
              <input type="file" name="bukti" class="form-control">
              <p class="text-danger">*maksimal 2mb</p>
            </div>
            <div class="alert alert-primary mt-3">
              <p>Silahkan bayar tagihan di <strong>BRI : 123456789 A/n FadisaCell</strong> sebesar Rp. <strong><?php echo number_format($pecah['harga']);?></strong></p>
            </div>
            <button class="btn btn-primary mt-3" name="bayar">Bayar</button>
        </form>
        
      </div>
      <!--  -->
      <!-- KODE PHP -->
      <?php
      if(isset($_POST['bayar'])){
        $tanggal = date('Y-m-d');
        $telepon = $_POST['telepon'];
        $total = $_POST['harga'];
        $id_pembeli = $_SESSION['pengguna']['id_pengguna'];

        $berkas =$_FILES['bukti']['name'];
        $berkassementara =$_FILES['bukti']['tmp_name'];
        // 
        $dirUpload = "../bukti_pembelian/";
        $foto_poduk = move_uploaded_file($berkassementara, $dirUpload.$berkas );

        $status = 'belum bayar';

        mysqli_query($koneksi, "INSERT INTO transaksi VALUES ('', '$id_pembeli', '$id', '$tanggal', '$telepon', '$total','$status', '$berkas')");

        $id_transaksi = $koneksi -> insert_id;

        mysqli_query($koneksi, "UPDATE transaksi SET status_pembelian='proses' WHERE id_transaksi = '$id_transaksi'");
        
        echo "<script>alert('pembayaran Berhasil, Silahkan tunggu');</script>";
        echo "<script>location='riwayat.php';</script>";
      }
      ?>

      <!--  -->
    

    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>