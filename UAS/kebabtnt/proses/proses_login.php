<?php
session_start();
include "connect.php";

$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "" ;
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "" ;


if(!empty($_POST['submit_validatee'])){
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' && password = '$password'");

    $hasil = mysqli_fetch_array($query);

    if($hasil){
        $_SESSION['username_kebabtnt'] = $username;
        $_SESSION['level_kebabtnt'] = $hasil['level'];
        header('location:../home');
    }else{ ?>
    <script>
        alert('Username dan Password Salah');
        window.location = '../login'
    </script>
    <?php
    }
}

?>