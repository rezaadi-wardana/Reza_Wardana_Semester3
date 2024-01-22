<?php
// session_start();
if (empty($_SESSION['username_kebabtnt'])) {
  header('location:login');
}

include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$_SESSION[username_kebabtnt]'");
$hasil = mysqli_fetch_array($query);

?>

<section class="about_section layout_padding">
    <div class="container  ">
        <div class="row">
            <div>
                <!-- sidebar -->
                <?php include "sidebar.php" ?>
                <!-- end sidebar -->
            </div>
            <div class="col-md-6">

        </div>
        </div>
    </div>
</section>