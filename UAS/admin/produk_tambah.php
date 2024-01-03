<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah Prouduk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><strong>Bopu</strong> Cell</a>   
        </div>        
    </nav> 
    <br>
    <div class="container">
        <h4>Menambah Data Produk</h4>
        <br>
        <form action="produk_tambah.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="row mb-3">
                <label for="inputJudul" class="col-sm-2 col-form-label">Judul Iklan</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="Judul" name="Judul" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputDes" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-3">
                    <textarea class="form-control" id="Des" name="Des" rows="3"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputMerek" class="col-sm-2 col-form-label">Merek Produk</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="Merek" name="Merek" required>
                </div>
            </div>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Kondisi</legend>
                <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Kondisi" id="gridRadios1" value="Baru" checked>
                    <label class="form-check-label" for="gridRadios1">
                    Baru
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Kondisi" id="gridRadios2" value="Bekas">
                    <label class="form-check-label" for="gridRadios2">
                    Bekas
                    </label>
                </div>
                </div>
          </fieldset>
          <div class="row mb-3">
                <label for="inputHarga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="Harga" name="Harga" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputTgl" class="col-sm-2 col-form-label">Tanggal Upload</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="Tgl" name="Tgl" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputGambar" class="col-sm-2 col-form-label">Foto Produk</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control" id="Gambar" name="Gambar" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputUser" class="col-sm-2 col-form-label">User / Admin</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="User" name="User" value="<?php echo $_SESSION['user'] ?>" readonly="readonly">
                </div>
            </div>
            <br> <br>
            <button type="submit" class="btn btn-outline-dark" name="simpan" value="Simpan">Tambahkan</button>
        </form>
        <?php
            if (isset ($_POST['simpan'])) {
                include "config.php";

                $judul_iklan_produk = $_POST['Judul'];
                $des_produk = $_POST['Des'];
                $merek_produk = $_POST['Merek'];
                $kondisi_produk = $_POST['Kondisi'];
                $hrg_produk = $_POST['Harga'];
                $tgl_produk = $_POST['Tgl'];
                $gambar_produk = basename($_FILES["Gambar"]["name"]);
                $user = $_POST['User'];

                $lokasi_file = $_FILES["Gambar"]["tmp_name"];
                $target_dir = "uploads/";
                $target_file = $target_dir.$gambar_produk; 

                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
                
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. <br>";
                  $uploadOk = 0;
                }
    
                if ($uploadOk == 0) {
                  echo "Maaf, file Anda gagal diupload.";
           
                } 
                else {
                    if (move_uploaded_file($lokasi_file, $target_file)){
                        echo "File ". htmlspecialchars($gambar_produk). " berhasil diupload.";
                        $sql="INSERT INTO produk VALUES (NULL,'$judul_iklan_produk','$des_produk','$merek_produk','$kondisi_produk', '$hrg_produk', '$tgl_produk', '$target_file', '$user')";
                        $hasil = mysqli_query($config, $sql);

                    }
                    else {
                        echo "Maaf, ada error ketika mengupload file Anda.";
                    }
                }
            }
        ?>
        <br>
        <a href="halaman_produk.php" class="btn btn-outline-dark">Kembali ke Halaman Data Produk</a>
    </div>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <p class="col-md-4 mb-0 text-muted">&copy; <strong>Bopu</strong> Cell</p>
          <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          </a>
        </footer>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>