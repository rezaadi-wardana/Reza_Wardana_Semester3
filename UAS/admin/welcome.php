<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        body{
            margin: 0;
            padding: 0;
            background-color: white;
            font-family: Arial, Helvetica, sans-serif;
        }
        p {
            padding: 0;
            margin: 0;
        }
        h1,h2,h3,h4,h5 {
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
        }
       
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><strong>Bopu</strong> Cell</a>   
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <form class="container">
                        <a href="login.php" class="btn btn-sm btn btn-outline-danger" type="button">Logout</a> 
                    </form>
                </div>
            </div>
        </div>        
    </nav> 
    <br>
    <div class="container">
        <h4>Control Panel</h4>
        <br>
        <?php
            session_start();
            if(isset($_SESSION['user'])) { ?>
                <h3 align="center">Selamat Datang
                    " <?php echo "<b>"; echo $_SESSION['user'] ; echo "</b>" ; ?> "</h3>
                    <br>
                <?php
                    echo "<p align = center> Berikut ini adalah menu navigasi anda</p>"; 
                ?>
                <p align = center><a href="halaman_beli.php" class="btn btn-outline-dark"> Halaman Jual Beli </a> | <a href="halaman_user.php" class="btn btn-outline-dark"> Halaman User </a></>
                <?php
            } 
            else { ?>
                <h2>Maaf...</h2>
                <p>Anda tidak berhak mengakses halaman ini. Silakan <a href="login.php">Login </a>terlebih dahulu. </p> <?php
            } 
        ?>

    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br>
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