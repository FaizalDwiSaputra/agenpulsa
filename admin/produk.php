<?php
include "../koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
    <a href="index.php?halaman=tambah" class="btn btn-primary my-3">Tambah Produk</a>
   <table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Provider</th>
            <th>Nominal</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;?>
        <?php
          $query = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY nama_provider ASC");
          while ($data = mysqli_fetch_assoc($query)){  
        ?>
        <tr>
            <td><?php echo $nomor++; ?></td>
            <td><?php echo $data['nama_provider'];?></td>
            <td><?php echo $data['nominal'];?></td>
            <td><?php echo $data['harga'];?></td>
            <td><img src="../foto_produk/<?php echo $data['logo_produk'];?>" alt="" width="100"></td>
            <td>
                <a href="index.php?halaman=edit&id=<?php echo $data['id_produk'];?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                <a href="hapus.php?id=<?php echo $data['id_produk'];?>" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus produk ini ?');"><i class="bi bi-trash"></i></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
   </table>

   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>