<?php
include "../koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN pengguna ON transaksi.id_pengguna = pengguna.id_pengguna WHERE id_transaksi = '$id'");
$pecah = mysqli_fetch_assoc($query);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
        <h2>Bukti pembayaran</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Total</th>
                        <th>No telepon</th>
                        <th>Bukti Pembayaran</th>
                        <th>Aksi</th>
                    </tr>  
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $pecah['nama_pengguna'] ?></td>
                        <td><?php echo $pecah['total'];?></td>
                        <td><?php echo $pecah['telepon'];?></td>
                        <td>
                            <img src="../bukti_pembelian/<?php echo $pecah['bukti']; ?>" alt="" width="500px">
                        </td>
                        <td>
                            <form action="" method="post">
                            <button class="btn btn-primary" name="konfirmasi">Konfirmasi</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
        if(isset($_POST['konfirmasi'])){
            $update = mysqli_query($koneksi, "UPDATE transaksi SET status_pembelian = 'Success' WHERE id_transaksi = $id ");
            echo "<script>alert('Success')</script>";
            echo "<script>location='index.php?halaman=pembelian';</script>";
        }
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>