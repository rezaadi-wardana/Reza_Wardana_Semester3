<?php
    include "config.php";
    
    $username = $_GET['username'];

    $sql = "DELETE FROM user_admin WHERE username='$username'";
    $hasil = mysqli_query($config, $sql);

    echo "<script> alert ('Data berhasil dihapus') </script>";
    header("location:halaman_user.php");

?>
    