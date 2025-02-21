<?php
include "../koneksi.php";
session_start();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        *{
            font-family: "Poppins";
        }
        .boy{
            background-color: #eee;
        }
        .full-kontainer{
            width: 60%;
            margin: 10% auto;
            background-color: #fff;
        }
        input{
            width: 100%;
            border: none;
            border-bottom: 1px solid #000;
        }
        form{
            width: 100%;
        }
    </style>
  </head>
  <body class="boy">
   <div class="full-kontainer d-md-flex shadow-sm">
        <div class="gambar">
            <img src="../assets/bg.jpg" alt="" class="">
        </div>
        <form action="" method="post" class="mx-4">
            <h2 class="text-center mt-2 text-uppercase">Login</h2>
            <div class="form-group mt-4 mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="pass" class="form-control">
            </div>
            <p class="mt-2">Belum punya akun ? daftar <a href="">Disini</a></p>
            <button class="btn btn-primary mt-2" name="login">Login</button>
        </form>

        <!--  -->
        <?php
        if(isset($_POST['login'])){
           $username = $_POST['username'];
           $pass = $_POST['pass'];

           $query = mysqli_query($koneksi, "SELECT * FROM pengguna");
           $dataakun = mysqli_num_rows($query);
           $pecah = mysqli_fetch_assoc($query);

           if($pecah['nama_pengguna'] = 'admin'){
            $_SESSION['admin'] = $pecah;
            echo "<script>alert('Berhasil Login');</script>";
            echo "<script>location='index.php'</script>";
           }else{
            echo "<div class='alert alert-danger'>Password atau Username salah</div?";
        }
        }
        ?>
        <!--  -->
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>