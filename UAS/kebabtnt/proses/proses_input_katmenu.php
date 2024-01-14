<?php
include "connect.php";

$jenis_menu = (isset($_POST['jenis_menu'])) ? htmlentities($_POST['jenis_menu']) : "";
$katmenu = (isset($_POST['katmenu'])) ? htmlentities($_POST['katmenu']) : "";


if (!empty($_POST['input_katmenu_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori_makanan FROM kategori_menu WHERE kategori_makanan = '$katmenu'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Kategori yang dimasukkan telah ada")
        window.location="../katmenu"
        </script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO kategori_menu (jenis_menu,kategori_makanan) values ('$jenis_menu','$katmenu')");
        if ($query) {
            $message = '<script>alert("Data Berhasil dimasukkan")
        window.location="../katmenu"
        </script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan")
        window.location="../katmenu"
        </script>';
        }
    }
}
echo $message;

?>