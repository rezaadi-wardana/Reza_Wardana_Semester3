<?php
    include "config.php";
    
    $idProduk = $_GET['id'];

    $sql = "DELETE FROM produk WHERE id='$idProduk'";
    $hasil = mysqli_query($config, $sql);

    echo "<script> alert ('Data berhasil dihapus') </script>";
    header("location:halaman_produk.php");

?>
