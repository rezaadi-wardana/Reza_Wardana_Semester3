<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bopu Cell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        body{
            margin: 0;
            padding: 0;
            background-color: white;
            font-family: Arial, Helvetica, sans-serif;
        }
       
        h1,h2,h3,h4,h5{
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
       
        .container{
            max-width: 1200px;
            margin: 0 auto;
            padding: 0;
        }
        .d-flex{
            display: flex;
        }
        .img-responsiv{
            width: 100%;
        }
        .jc-spacebetween{
            justify-content: space-between;
        }

        .hero{
            margin-top: 30px;
            display: flex;
        }
        .hero p{
            font-size: 14px;
            line-height: 180%;
        }
        .desc{
            padding: 35px 10px 0px 20px;
            float: left;
            width: 40%;
        }
        .bigtitle{
            font-size: 2.7em;
        }
        .spacercontent{
            margin-bottom: 20px;
        }
        .spacersection{
            padding: 2% 0;
        }
        .image{
            float: right;
            width: 70%;
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
                        <a href="admin/login.php" class="btn btn-sm btn-outline-light" type="button">Login</a> 
                        <a href="admin/register.php" class="btn btn-sm btn-outline-light" type="button">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container hero spacercontent">
        <div class="desc">
            <h2 class="bigtitle">Dapatkan Handphone Bekas Berkualitas Dengan Harga Terjangkau.</h2>
            <div class="spacercontent"></div>
            <p>Platform kami sudah dipercayai oleh 1.000.000+ orang. Kami juga bekerja sama dengan mitra yang profesional. </p>
        </div>
        <div class="image">
            <div class="container corousel-contain">
                <div id="carouselExampleIndicators" class="carousel slide col-lg-10 offset-lg-1 " data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                    </div> 
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="image/slide1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="image/slide2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="image/slide3.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="image/slide4.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="image/slide5.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="image/slide6.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container produk mt-5">
        <h1 class="mb-4">Produk</h1>
        <div class="container">
            <div class="row row-cols-4">
                <?php
                    include "config.php";
                    $sql=mysqli_query($config, "SELECT id, gambar, judul, deskripsi, harga FROM produk order by id ASC");
                    while ($row=mysqli_fetch_array($sql)){
                        $judul_iklan_produk=$row['judul'];
                       ?>
                       <div class="col mb-5">
                            <div class="card" style="width: 18rem;">
                                <img src='../21.12.2138_Ika Purwanti_SI 05/admin/<?php echo $row['gambar']; ?>' class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4><?php echo $row['judul'] ?></h4>
                                    <p><?php echo $row['deskripsi'] ?></p>
                                    <p><?php echo "Rp. ".$row['harga'].""?></p>
                                    <?php
                                        echo "
                                        <a class='btn btn-outline-primary' href='admin/login.php?id=".$row['id']."'>Beli</a> "
                                    ?>
                                </div>
                            </div>
                       </div>
                       <?php

                    }
                ?>
            </div>
        </div>
    </div>

    <br><br>
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