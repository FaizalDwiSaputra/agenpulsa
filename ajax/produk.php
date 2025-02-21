<?php
include "../koneksi.php";
?>
<div class="kontainer-2 mb-5" id="tabel-produk">
         <div class="row">
            <?php
            $keyword = $_GET['keyword'];
            $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_provider LIKE '%$keyword%'");
            while ($data = mysqli_fetch_assoc($query)){
            ?>
            <div class="col-lg-4 col-md-6 col-6 mb-3">
                <div class="kartu ">
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
</div>