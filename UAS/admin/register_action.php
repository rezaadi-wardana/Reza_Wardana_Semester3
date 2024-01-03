<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Proses Register</title>
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
        <h4>Keterangan</h4>
        <br> <br>

        <?php
            session_start();
            include "config.php";
                        
            $username = $_POST['Username'];
            $pass = $_POST['Password'];
            $namaleng = $_POST['NamaLengkap'];
            $nohp = $_POST['Nohp'];

            $sql= "INSERT INTO user_admin VALUES ('$username','$pass','$namaleng','$nohp')";

            $hasil =  $hasil = mysqli_query($config,$sql) or exit("Error query : <b>".$sql."</b>.");

            echo "<br><h5>Data user dengan username <b><i>".$username."</b></i> berhasil ditambahkan.</h5>";

        ?>
        <br><br><br>
        <p>Klik <a href="login.php" class="btn btn-outline-primary">Disini</a> untuk login</p>

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
