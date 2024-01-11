
    <?php
  
    if (isset($_GET['x']) && $_GET['x']=='beranda'){
      $page = "home.php";
      include "main.php";
    } else
    if (isset($_GET['x']) && $_GET['x']=='menu'){
      $page = "menu.php";
      include "main.php";
    } else
    if (isset($_GET['x']) && $_GET['x']=='tentang'){
      $page = "about.php";
      include "main.php";
    } else
    if (isset($_GET['x']) && $_GET['x']=='login'){
      include "login.php";
    } else{
      $page = "home.php";
      include "main.php";
    }

    ?>

