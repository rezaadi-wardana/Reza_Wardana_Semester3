<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$_SESSION[username_kebabtnt]'");
$records = mysqli_fetch_array($query);
?>

<div class="hero_area">
  <div class="bg-box">
    <img src="images/hero-bg.jpg" st alt="">
  </div>

  <header class="header_section">
    <div class="container-lg">
      <nav class="navbar navbar-expand-lg custom_nav-container sticky-top">

        <a class="navbar-brand text-align-center " href=".">
          <span class=" d-flex">
            <div class=" me-3 collapse navbar-collapse" id="logo"><img src="assets/img/LOGODARK.png" alt=""
                width="50rem" height="50rem">
              </div>
                 Kebab Burger TNT
          </span>
          </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class=""> </span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav justify-content-start">
        <li
          class="nav-item <?php echo (isset($_GET['x']) && $_GET['x'] == 'beranda') || !isset($_GET['x']) ? 'active' : ''; ?>">
          <a class="nav-link" href="beranda ">Beranda </a>
        </li>
        <li class="nav-item  <?php echo (isset($_GET['x']) && $_GET['x'] == 'menuheader') ? 'active' : ''; ?>">
          <a class="nav-link" href="menuheader">Menu</a>
        </li>
        <li class="nav-item <?php echo (isset($_GET['x']) && $_GET['x'] == 'tentang') ? 'active' : ''; ?>">
          <a class="nav-link " href="tentang">Tentang</a>
        </li>
        <li class="nav-item <?php echo (isset($_GET['x']) && $_GET['x'] == 'home') ? 'active' : ''; ?>">
          <a class="nav-link " href="home">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-warning" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false" style="text-transform: lowercase;">
            <span>
              <?php echo $hasil['username']; ?>
              <i class="bi bi-person-fill"></i>
            </span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end mt-2">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalUbahProfil"><i
                  class="bi bi-person-square"></i> Profil</a></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalUbahPassword"><i
                  class="bi bi-arrow-repeat"></i></i>Ubah Password</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
    </nav>
</div>
</header>

<!-- MODAL UBAH PASSWORD-->
<div class="modal fade" id="modalUbahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> UBAH PASSWORD</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="proses/proses_ubah_password.php" method="POST" class="needs-validation" novalidate>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-floating mb-3">
                <input disabled required type="email" class="form-control" id="floatingInput" name="username"
                  value="<?php echo $_SESSION['username_kebabtnt'] ?>">
                <label for="floatingInput">Username/Email</label>
                <div class="invalid-feedback">
                  Masukkan Email
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-floating mb-3">
                <input required type="password" class="form-control" id="floatingPassword" name="passwordlama">
                <label for="floatingPassword">Password Lama</label>
                <div class="invalid-feedback">
                  Masukkan Password Lama
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-floating mb-3">
                <input required type="password" class="form-control" id="floatingPassword" name="passwordbaru">
                <label for="floatingPassword">Password Baru</label>
                <div class="invalid-feedback">
                  Masukkan Password Baru
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-floating mb-3">
                <input required type="password" class="form-control" id="floatingPassword" name="repasswordbaru">
                <label for="floatingPassword">Konfirmasi Password Baru</label>
                <div class="invalid-feedback">
                  Masukkan Konfirmasi Password Baru
                </div>
              </div>
            </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="ubah_password_validate" value="123456">Save
              changes</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- AKHIR MODAL UBAH PASSWORD-->

<!-- MODAL UBAH PROFIL-->
<div class="modal fade" id="modalUbahProfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> UBAH PROFIL</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="proses/proses_ubah_profil.php" method="POST" class="needs-validation" novalidate>
          <div class="row">
            <div class="col-lg-4">
              <div class="form-floating mb-3">
                <input disabled required type="email" class="form-control" id="floatingInput" name="username"
                  value="<?php echo $_SESSION['username_kebabtnt'] ?>">
                <label for="floatingInput">Username/Email</label>
                <div class="invalid-feedback">
                  Masukkan Email
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingNama" name="nama"
                  value="<?php echo $records['nama'] ?>">
                <label for="floatingNama">Nama</label>
                <div class="invalid-feedback">
                  Masukkan Nama Anda
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingNoHP" name="nohp"
                  value="<?php echo $records['nohp'] ?>">
                <label for="floatingNoHP">Nomor HP</label>
                <div class="invalid-feedback">
                  Masukkan Nomor HP Anda.
                </div>
              </div>
            </div>
            <div class="row">

            </div>
            <div class="col-lg-12">
              <div class="form-floating mb-3">
                <textarea class="form-control" name="alamat" id=""
                  style="height:100px"><?php echo $records['alamat'] ?></textarea>
                <label for="floatingPassword">Alamat</label>
                <div class="invalid-feedback">
                  Masukkan Alamat Anda
                </div>
              </div>
            </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="ubah_profil_validate" value="123456">Save
              changes</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>


<!-- AKHIR MODAL UBAH PROIFL-->