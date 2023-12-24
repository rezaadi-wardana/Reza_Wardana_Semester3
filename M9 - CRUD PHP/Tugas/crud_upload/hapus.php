<?php
require("function.php");

function hapusRekapData($id_pemesan)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM detail_pemesan WHERE id_pemesan = '$id_pemesan' ");
    mysqli_query($conn, "DELETE FROM pemesan WHERE id_pemesan = '$id_pemesan' ");

    return mysqli_affected_rows($conn);
}

$id_pemesan = $_GET['id_pemesan'];

if (hapusRekapData($id_pemesan) > 0) {
    echo "
        <script>
            alert ('Data Produk $id_pemesan Berhasil Dihapus')
            document.location.href = '../data-pemesan.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert ('Data Gagal Dihapus')
            document.location.href = '../data-pemesan.php';
        </script>";
}