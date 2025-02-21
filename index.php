<?php
session_start();
include "koneksi.php";
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
        .orang{
            border: none;
            background-color: transparent;
            font-size: 20px;
        }
        span{
          color: orange;
        }
    </style>
  </head>
  <body>
    <div class="full-kontainer">
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Fadisa <span>Cell</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse  justify-content-between" id="navbarNavAltMarkup">
            <div class="navbar-nav ">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="#produk">Produk</a>
              <a class="nav-link" href="./user/riwayat.php">Cek Pesanan</a>
            </div>
            <?php if(isset($_SESSION['pengguna'])): ?>
            <div class="bungkus-logout">
              <a href="logout.php" class="logout" onclick="return confirm('Ingin logout ?');">Logout</a>
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
    
      <!-- -->
        <div class="kontainer-1">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                <img src="./assets/bgpulsa.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                <img src="./assets/bg2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./assets/bg1.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div>
      <!--  -->
      <!--  -->
      <div class="full-kontainer-3 mt-2 rounded-1">
        <div class="row">
          <div class="col-md-4 col-12 p-4">
            <div class="kartu-proses">
              <div class="icon-proses mb-2">
                <i class="bi bi-award px-2 agen"></i>
              </div>
              <h3 >Agen Terpercaya</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, odio!</p>
            </div>
          </div>

          <div class="col-md-4 col-12 p-4">
            <div class="kartu-proses">
              <div class="icon-proses mb-2">
                <i class="bi bi-lightning px-2 cepat"></i>
              </div>
              <h3>Proses Cepat</h3>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, amet?</p>
            </div>
          </div>

          <div class="col-md-4 col-12 p-4">
            <div class="kartu-proses">
              <div class="icon-proses mb-2">
                <i class="bi bi-patch-check px-2 verif "></i>
              </div>
              <h3>Sudah Terverifikasi</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, quidem.</p>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <!--  -->
      <div class="full-kontainer-2" id="produk">
        <div class="pencarian mt-5 d-md-flex align-items-md-center justify-content-md-between">
              <h1 class="">Kartu SIM</h1>
            <div class="cari mb-3 mb-md-0">
            <form action="" method="post">
              <input type="text" name="keyword" id="keyword" placeholder="telkomsel, etc bi" autocomplete="off"> <i class="bi bi-search"></i>
            </form>
            </div>
        </div>
        <div class="kontainer-2 mb-5" id="tabel-produk">
         <div class="row">
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY nama_provider ASC ");
            while ($data = mysqli_fetch_assoc($query)){
            ?>
            <div class="col-lg-4 col-md-6 col-6 mb-3">
                <div class="kartu">
                <div class="logo pt-3">
                    <img src="./foto_produk/<?php echo $data['logo_produk'];?>" alt="" width="100" class="d-block m-auto">
                </div>
                <div class="deskripsi-produk p-4">
                <div class="deskripsi">
                    <h4><?php echo $data['nama_provider']; ?></h4>
                    <p>RP. <?php echo number_format($data['nominal']);?></p>
                </div>
                <div class="beli text-center mt-5 ">
                    <a href="./user/transaksi.php?id=<?php echo $data['id_produk'];?>" class="w-100">Beli sekarang</a>
                </div>
                </div>
                </div>
            </div>
            <?php } ?>
         </div>
         <button class="btn btn-primary" id="load-more">lainya</button>   
        </div>
        </div>
      <!--  -->
      <!--  -->
      <div class="footer">
        <div class="row p-4">
          <div class="col-md-4 col-12 servis">
            <div class="kartu-footer">
              <h3 class="text-light mb-3">Dapatkan promo terbaik hanya di Fadisa <span>Cell</span></h3>
              <p class="text-light">Tetap terhubung dengan kami : </p>
              <div class="icon-footer d-flex gap-2">
                <a href=""><i class="bi bi-whatsapp"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-12 servis">
            <div class="kartu-footer">
              <h3 class="text-light">Didukung oleh</h3>
              <div class="icon-provider-indosat">
                <img src="./assets/indosat-removebg-preview.png" alt="" width="100">
              </div>
              <div class="icon-provider-indosat">
                <img src="./assets/telkomsel-removebg-preview.png" alt="" width="100">
              </div>
              <div class="icon-provider-indosat">
                <img src="./assets/Logo_Smartfren-removebg-preview.png" alt="" width="100">
              </div>
              <div class="icon-provider-indosat">
                <img src="./assets/xl-removebg-preview.png" alt="" width="100">
              </div>
            </div>
          </div>

          <div class="col-md-4 col-12 servis">
            <div class="kartu-footer">
              <h3  class="text-light">Servis</h3>
              <a href="#produk" class="text-warning text-decoration-none">- Isi ulang pulsa</a>
            </div>
          </div>

        </div>
      </div>
      <!-- FOOTER -->

      <div class="full-kontainer-footer" style="background-color: orange; height: 50px">
        <div class="deskripisi-footer">
          <p style="line-height:50px ;" class="text-center">Copyright &copy Fadisa<span class="text-primary">Cell</span> Tahun 2024</p>
        </div>
      </div>

    
    </div>
    <script src="./js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        var itemsToShow = 6; // Jumlah item yang akan ditampilkan awalnya
        var itemsIncrement = 6; // Jumlah item yang akan ditampilkan setiap klik

        // Sembunyikan semua produk kecuali 'itemsToShow' pertama
        $('.kartu').slice(itemsToShow).hide();

        $('#load-more').on('click', function() {
            var hiddenItems = $('.kartu:hidden');
            
            if (hiddenItems.length === 0) {
                // Jika tidak ada item tersembunyi, sembunyikan semua produk kecuali 'itemsToShow' pertama dan ubah teks tombol
                $('.kartu').slice(itemsToShow).slideUp();
                $(this).text('Lainnya').show();
            } else {
                // Tampilkan produk tambahan sebanyak 'itemsIncrement'
                hiddenItems.slice(0, itemsIncrement).slideDown();
                // Jika semua produk sudah ditampilkan, ubah teks tombol menjadi "Sembunyikan"
                if (hiddenItems.length <= itemsIncrement) {
                    $(this).text('Sembunyikan');
                }
            }
        });
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>