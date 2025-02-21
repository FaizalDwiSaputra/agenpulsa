<?php
include "../koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: "Poppins";
        }
    </style>
  </head>
  <body>
    <div class="full-kontainer container">
    <h2>Tambah Produk</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Provider</label>
                <input type="text" class="form-control" name="provider">
            </div>

            <div class="form-group">
                <label>Nominal</label>
                <input type="text" class="form-control" name="nominal">
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="text" class="form-control" name="harga">
            </div>

            <div class="form-group">
                <label>Logo</label>
                <input type="file" class="form-control" name="logo">
            </div>
            <button class="btn btn-primary my-3" name="tambah" type="submit">Tambah</button>
        </form>
        </div>
        <!-- KODE PHP -->
        <?php
        if(isset($_POST['tambah'])){
            $provider = $_POST['provider'];
            $nominal = $_POST['nominal'];
            $harga = $_POST['harga'];

            $berkas =$_FILES['logo']['name'];
            $berkassementara =$_FILES['logo']['tmp_name'];
            // 
            $dirUpload = "../foto_produk/";
            $foto_poduk = move_uploaded_file($berkassementara, $dirUpload.$berkas );


            $query = mysqli_query($koneksi, "INSERT INTO produk VALUES ('','$provider', '$nominal','$harga', '$berkas' )");
            echo "<script>alert('Data berhasil ditambahkan');</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
        }
        ?>
        <!--  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>