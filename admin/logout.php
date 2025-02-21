<?php
session_start();
unset($_SESSION['admin']);
session_destroy();
echo "<script>location='login.php';</script>"
?>