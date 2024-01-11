<?php
session_start();
include "connect.php";


$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$passwordlama = (isset($_POST['passwordlama'])) ? md5(htmlentities($_POST['passwordlama'])) : "";
$passwordbaru = (isset($_POST['passwordbaru'])) ? md5(htmlentities($_POST['repasswordbaru'])) : "";
$repasswordbaru = (isset($_POST['passwordbaru'])) ? md5(htmlentities($_POST['repasswordbaru'])) : "";


if (!empty($_POST['ubah_password_validate'])) {
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$_SESSION[username_kebabtnt]' && password = '$passwordlama'");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        if ($passwordbaru == $repasswordbaru) {
            $query = mysqli_query($conn, "UPDATE user SET password='$passwordbaru' WHERE  username = '$_SESSION[username_kebabtnt]' ");
            if ($query) {
                $message = '<script>alert("Password Berhasil diubah");
            window.history.back()
            </script>';
            } else {
                $message = '<script>alert("Password Gagal Diubah");
                window.history.back()
                </script>';
            }
        }else{
            $message = '<script>alert("Password Baru Tidak Sama");
            window.history.back()
            </script>';
        }

    } else {
        $message = '<script>alert("Password Lama Tidak sesuai");
        window.history.back()
        </script>';
    }
}else {
    header('location:../home');
}

echo $message;
?>
