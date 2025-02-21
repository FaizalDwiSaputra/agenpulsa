<?php
session_start();
unset($_SESSION['pengguna']);
session_destroy();
echo "<script>location='index.php';</script>";
?>