<?php
    $config = mysqli_connect("localhost", "root", "", "jualbelihpbekas_2138");
    if (!$config){
        die('Gagal terhubung ke MySQLi : '.mysqli_connect_error());
    }

?>