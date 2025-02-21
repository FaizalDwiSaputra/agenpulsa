<?php
include "../koneksi.php";
$id = $_GET['id'];

$tampil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id'");

if(isset($_POST['edit'])){
    $provider = $_POST['provider'];
    $nominal = $_POST['nominal'];
    $harga = $_POST['harga'];

    $berkas =$_FILES['logo']['name'];
    $berkassementara =$_FILES['logo']['tmp_name'];
    // 
    $dirUpload = "../foto_produk/";
    $foto_poduk = move_uploaded_file($berkassementara, $dirUpload.$berkas );

    $query = mysqli_query($koneksi, "UPDATE produk SET nama_provider = '$provider', nominal = '$nominal', harga = '$harga', logo_produk='$berkas' WHERE id_produk='$id'");
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";

}
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
    <h2>Edit Produk</h2>
        <form action="" method="post" enctype="multipart/form-data">

        <?php
        while ($data = mysqli_fetch_assoc($tampil)){
        ?>
            <div class="form-group">
                <label>Provider</label>
                <input type="text" class="form-control" name="provider" value="<?php echo $data['nama_provider'];?>">
            </div>

            <div class="form-group">
                <label>Nominal</label>
                <input type="text" class="form-control" name="nominal" value="<?php echo $data['nominal'];?>">
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="text" class="form-control" name="harga" value="<?php echo $data['harga'];?>">
            </div>
            <div class="foto-lama">
                <img src="../foto_produk/<?php echo $data['logo_produk']; ?>" alt="" width="100">
            </div>
            <div class="form-group">
                <label>Logo</label>
                <input type="file" class="form-control" name="logo">
            </div>
            <button class="btn btn-primary my-3" name="edit" type="submit">Edit</button>
            <?php } ?>
        </form>
        </div>
        <!-- KODE PHP -->
        <!--  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>