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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>No Telepon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor=1; ?>
                    <?php 
                        $query = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN pengguna ON transaksi.id_pengguna = pengguna.id_pengguna");
                        while ($data = mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $data['nama_pengguna'];?></td>
                        <td><?php echo $data['total'];?></td>
                        <td><?php echo $data['tanggal'];?></td>
                        <td><?php echo $data['telepon'];?></td>
                        <td>
                            <?php if ($data['status_pembelian'] == 'proses'):?>
                            <span class="badge text-bg-warning"><?php echo $data['status_pembelian']; ?></span>
                            <?php else :?>
                            <span class="badge text-bg-success"><?php echo $data['status_pembelian']; ?></span>
                        </td>
                            <?php endif ?>
                        <td>
                            <a href="index.php?halaman=lihat&id=<?php echo $data['id_transaksi']; ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>