 <!-- SIDEBAR -->
 <div class="col-lg-3">
  <style>
  </style>
          <nav class="navbar navbar-expand-lg bg-body-tertiary rounded border mt-3 navbarHilang">
          <button style="max-width: 100%;"class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
      aria-controls="offcanvasNavbar" aria-label="Toggle navigation"><b>
      <i class="bi bi-chevron-compact-right"></i> Peralatan Dashboard</b>
            </button>
            <div class="container-fluid">
       
              <div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 250px;">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel">PERALATAN DASHBOARD </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1 ">
                    <li class="nav-item">
                      <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x']=='home') || !isset($_GET['x'])) ? 'active link-light bg-dark' : 'link-dark bg-light' ; ?>  ps-2" aria-current="page" href="home" ><i class="bi bi-house-fill"></i> Dasboard</a>
                    </li>
                    <?php if($hasil['level']==1){?>
                    <li class="nav-item">
                      <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='menu') ? 'active link-light bg-dark' : 'link-dark bg-light' ; ?> ps-2" href="menu"><i class="bi bi-list-task"></i> Daftar Menu</a>
                    </li>
                    <?php } ?>
                    <?php if($hasil['level']==1){?>
                    <li class="nav-item">
                      <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='katmenu') ? 'active link-light bg-dark' : 'link-dark bg-light' ; ?> ps-2" href="katmenu"><i class="bi bi-tags-fill"></i> Kategori Menu</a>
                    </li>
                    <?php } ?>
                      <?php if($hasil['level']==1 || $hasil['level']==2 || $hasil['level']==3) {?>

                    <li class="nav-item">
                      <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='order') ? 'active link-light bg-dark' : 'link-dark bg-light' ; ?> ps-2" href="order"><i class="bi bi-cart-fill"></i> Order</a>
                    </li>

                    <?php } ?>

                    <?php if($hasil['level']==1 || $hasil['level']==2)  {?>
                    <li class="nav-item">
                      <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='dapur') ? 'active link-light bg-dark' : 'link-dark bg-light' ; ?> ps-2" href="dapur"><i class="bi bi-fire"></i> Dapur</a>
                    </li>
                    <?php } ?>
                
                    <?php if($hasil['level']==1){?>
                    
                    <li class="nav-item">
                      <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='user') ? 'active link-light bg-dark' : 'link-dark bg-light' ; ?> ps-2" href="user"><i class="bi bi-archive-fill"></i> User</a>
                    </li>
                    <?php } ?>
                    <?php if($hasil['level']==1 || $hasil['level']==2){?>

                    <li class="nav-item">
                      <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='report') ? 'active link-light bg-dark' : 'link-dark bg-light' ; ?> ps-2" href="report"><i class="bi bi-sticky-fill"></i> Report</a>
                    </li>
                    <?php } ?>
                  </ul>
                 
                </div>
              </div>
            </div>
          </nav>
        </div>
        <!-- END SIDEBAR -->
