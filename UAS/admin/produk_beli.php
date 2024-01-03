<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Beli Produk</title>
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
        <p align="left">Anda login sebagai "<?php echo "<b>"; echo $_SESSION['user'] ; echo "</b>" ; ?>"</p> 
        <br>
        <h4>Beli Produk</h4>
        <br>
        <?php
            include "config.php";

            if (isset($_GET['id'])){ 
                $idProduk=$_GET['id']; 
                $sql_edit=mysqli_query($config,"SELECT * FROM produk WHERE id='$idProduk'");
                while ($data=mysqli_fetch_array($sql_edit)){
                    $judul_iklan_produk=$data['judul'];
                    $des_produk=$data['deskripsi'];
                    $merek_produk=$data['merek'];
                    $kondisi_produk=$data['kondisi'];
                    $hrg_produk=$data['harga'];
                    $tgl_produk=$data['tanggal_upload'];
                    $gambar_produk=$data['gambar'];
                    $username=$data['username'];
                    
                }
        ?>
        
        <form action="produk_beli.php" method="POST">
            <div class="row mb-3">
                <label for="inputId" class="col-sm-2 col-form-label">ID Produk</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="idProduk" name="idProduk" value="<?php echo $idProduk ?>" readonly="readonly">
                </div>
            </div>  
            <div class="row mb-3">
                <label for="inputJudul" class="col-sm-2 col-form-label">Judul Iklan</label>
                <div class="col-sm-3">
                    <input type="textarea" class="form-control" id="Judul" name="Judul" value="<?php echo $judul_iklan_produk ?>" readonly="readonly">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputDes" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-3">
                    <textarea class="form-control" id="Des" name="Des" rows="3" readonly="readonly"><?php echo $des_produk ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputMerek" class="col-sm-2 col-form-label">Merek Produk</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="Merek" name="Merek" value="<?php echo $merek_produk ?>" readonly="readonly">
                </div>
            </div>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Kondisi</legend>
                <div class="col-sm-3">
                    <?php 
                        if ($kondisi_produk=='Baru'){
                        echo "
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='Kondisi' id='gridRadios1' value='Baru' checked>
                            <label class='form-check-label' for='gridRadios1'>
                            Baru
                            </label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='Kondisi' id='gridRadios2' value='Bekas'>
                            <label class='form-check-label' for='gridRadios2'>
                            Bekas
                            </label>
                        </div>
                        ";
                        }
                        else
                        {
                        echo "
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='Kondisi' id='gridRadios1' value='Baru'>
                            <label class='form-check-label' for='gridRadios1'>
                            Baru
                            </label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='Kondisi' id='gridRadios2' value='Bekas' checked>
                            <label class='form-check-label' for='gridRadios2'>
                            Bekas
                            </label>
                        </div>
                        ";
                        }
                    ?>
                </div>
            </fieldset>
            <div class="row mb-3">
                <label for="inputHarga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="Harga" name="Harga" value="<?php echo $hrg_produk ?>" readonly="readonly">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputTgl" class="col-sm-2 col-form-label">Tanggal Upload</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="Tgl" name="Tgl" value="<?php echo $tgl_produk ?>" readonly="readonly">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputGambar" class="col-sm-2 col-form-label">Foto Produk</label>
                <div class="col-sm-3">
                <image width='60px' src='<?php echo $gambar_produk ?>'>
                File terupload : <?php echo $gambar_produk ?>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputUser" class="col-sm-2 col-form-label">Penjual</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="User" name="User" value="<?php echo $username ?>" readonly="readonly">
                </div>
            </div>
            <br> <br>
            <button type="submit" class="btn btn-outline-primary" name="beli" value="beli">Beli</button>
        </form>

        <?php
            }

            if (isset ($_POST['beli'])) {
                $idProduk=$_POST['idProduk'];
                $judul_iklan_produk = $_POST['Judul'];
                $des_produk = $_POST['Des'];
                $merek_produk = $_POST['Merek'];
                $kondisi_produk = $_POST['Kondisi'];
                $hrg_produk = $_POST['Harga'];
                $tgl_produk = $_POST['Tgl'];
                $username = $_POST['User'];

                $sql = mysqli_query ($config, "DELETE FROM produk WHERE id='$idProduk'");

                echo "<br><h5>Data produk dengan judul iklan produk <b><i>".$judul_iklan_produk."</b></i> berhasil dibeli oleh <b>". $_SESSION['user'] ."</b>.</h5>";

            }
        ?>
        <br>
        <a href="halaman_beli.php" class="btn btn-outline-dark">Kembali ke Halaman Utama</a>
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