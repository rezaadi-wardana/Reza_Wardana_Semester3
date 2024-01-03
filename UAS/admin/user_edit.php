<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit User</title>
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
        <h4>Edit Data User</h4>
        <br>
        <?php
            include "config.php";

            if (isset($_GET['username'])){ 
                $username=$_GET['username']; 
                $sql_edit=mysqli_query($config,"SELECT * FROM user_admin WHERE username='$username'");
                while ($data=mysqli_fetch_array($sql_edit)){
                    $pass=$data['password'];
                    $namaleng=$data['namalengkap'];
                    $nohp=$data['nohp'];
                }
        ?>

        <form action="user_edit.php" method="POST" autocomplete="off">
            <div class="row mb-3">
                <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="Username" name="Username" value="<?php echo $username ?>" readonly="readonly">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-3">
                    <input type="password" class="form-control" id="Password" name="Password" value="<?php echo $pass ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputNamaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="NamaLengkap" name="NamaLengkap" value="<?php echo $namaleng ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputNohp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="Nohp" name="Nohp" value="<?php echo $nohp ?>">
                </div>
            </div>
            <br> <br> 
            <button type="submit" class="btn btn-outline-dark" name="simpan" value="Simpan">Simpan Perubahan</button>
        </form>

        <?php
            }

            if (isset ($_POST['simpan'])) {
           
                $username = $_POST['Username'];
                $pass = $_POST['Password'];
                $namaleng = $_POST['NamaLengkap'];
                $nohp = $_POST['Nohp'];
    
                $sql=mysqli_query ($config, "UPDATE user_admin SET password='$pass', namalengkap='$namaleng', nohp='$nohp' WHERE username='$username'");
    
                echo "<br><h5>Data user dengan username <b><i>".$username."</b></i> berhasil diubah.</h5>";
    
            }

        ?>
        <br>
        <a href="halaman_user.php" class="btn btn-outline-dark">Kembali ke Halaman User</a>
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