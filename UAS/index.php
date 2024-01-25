
    <?php

    // mengecek GET dari header yang ditekan
  
    if (isset($_GET['x']) && $_GET['x']=='beranda'){
      $page = "beranda.php";
      include "main.php";
    } else
    if (isset($_GET['x']) && $_GET['x']=='menuheader'){
      $page = "menuheader.php";
      include "main.php";
    } else
    if (isset($_GET['x']) && $_GET['x']=='tentang'){
      $page = "about.php";
      include "main.php";
    } else
    if (isset($_GET['x']) && $_GET['x']=='login'){
      include "login.php";
    } else{
      $page = "beranda.php";
      include "main.php";
    }

    ?>

