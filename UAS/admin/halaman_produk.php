<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><strong>Bopu</strong> Cell</a>   
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="halaman_beli.php">Home</a>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <form class="container">
                        <a href="login.php" class="btn btn-sm btn btn-outline-danger" type="button">Logout</a> 
                    </form>
                </div>
            </div>
        </div>        
    </nav> 
    <br>
    <div class="container">
        <p align="left">Anda login sebagai "<?php echo "<b>"; echo $_SESSION['user'] ; echo "</b>" ; ?>"</p> 
        <br>
        <h4>Data Produk</h4>
        <br>
        <a href="produk_tambah.php" class="btn btn-outline-dark">Tambah Produk</a>
        <br>
        <br> <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" style='text-align: center;'>No</th>
                    <th scope="col" style='text-align: center;'>Judul</th>
                    <th scope="col" style='text-align: center;'>Deskripsi</th>
                    <th scope="col" style='text-align: center;'>Merek</th>
                    <th scope="col" style='text-align: center;'>Kondisi</th>
                    <th scope="col" style='text-align: center;'>Harga</th>
                    <th scope="col" style='text-align: center;'>Tanggal Upload</th>
                    <th scope="col" style='text-align: center;'>Foto Produk</th> 
                    <th scope="col" style='text-align: center;'>Penjual</th>
                    <th scope="col" style='text-align: center;'>Kelola</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php 
                    include "config.php";
                    $sql=mysqli_query($config, "select * from produk order by id ASC");
                    $no=1;
                        while ($row=mysqli_fetch_array($sql)){
                            $judul_iklan_produk=$row['judul'];
                                echo "
                                    <tr>
                                        <td width='30' style='text-align: center;'>".$no."</td>
                                        <td width='80' style='text-align: center;'>".$row['judul']."</td>
                                        <td width='100' style='text-align: center;'>".$row['deskripsi']."</td>
                                        <td width='50' style='text-align: center;'>".$row['merek']."</td>
                                        <td width='60' style='text-align: center;'>".$row['kondisi']."</td>
                                        <td width='50' style='text-align: center;'>".$row['harga']."</td>
                                        <td width='110' style='text-align: center;'>".$row['tanggal_upload']."</td>
                                        <td width='150' style='text-align: center;'><image width='100%' src=".$row['gambar']."></td>
                                        <td width='100' style='text-align: center;'>".$row['username']."</td>
                                        <td width='110' style='text-align: center;'>
                                            <a class='btn btn-outline-dark' href='produk_edit.php?id=".$row['id']."'>Edit</a>
                                            <a class='btn btn-outline-danger' href='produk_hapus.php?id=".$row['id']."'>Hapus</a> 
                                        </td>
                                    </tr>
                                                ";
                            $no++;
                            };
                ?>
            </tbody>
        </table>
    </div>

    <br>
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