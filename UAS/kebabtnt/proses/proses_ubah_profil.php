<?php
session_start();
include "connect.php";
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";


if (!empty($_POST['ubah_profil_validate'])) {
    $query = mysqli_query($conn, "UPDATE user SET nama='$nama', nohp ='$nohp', alamat ='$alamat' WHERE username='$_SESSION[username_kebabtnt]'");
    if ($query) {
        $message = '<script>alert("Data Profil Berhasil diupdate");
            window.history.back();
            </script>';
    } else {
        $message = '<script>alert("Data Profil Gagal diupdate");
                window.history.back();
                </script>';
    }
} else {
    $message = '<script>alert("Terjadi Kesalahan");
            window.history.back();
            </script>';
}
echo $message;

?>