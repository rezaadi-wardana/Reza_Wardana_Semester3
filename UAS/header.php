<div class="hero_area" >
    <div class="bg-box">
      <img src="images/hero-bg.jpg" st alt="">
    </div>

<header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href=".">
            <span>
              Kebab Burger TNT
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item <?php echo (isset($_GET['x']) && $_GET['x']=='beranda') || !isset($_GET['x']) ? 'active': '';?>">
                <a class="nav-link" href="beranda ">Beranda </a>
              </li>
              <li class="nav-item  <?php echo (isset($_GET['x']) && $_GET['x']=='menuheader') ? 'active': '';?>">
                <a class="nav-link" href="menuheader">Menu</a>
              </li>
              <li class="nav-item <?php echo (isset($_GET['x']) && $_GET['x']=='tentang') ? 'active': '';?>">
                <a class="nav-link " href="tentang">Tentang</a>
              </li>
            
            </ul>
            <div class="user_option">
            
      
              <a href="kebabtnt" class="order_online text-dark">
               Login <i class="bi bi-person-fill"></i>
              </a>
            </div>
          </div>
        </nav>
      </div>
      </header>
