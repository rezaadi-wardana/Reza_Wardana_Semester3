<?php
include "kebabtnt/proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM daftar_menu
    LEFT JOIN kategori_menu ON kategori_menu.id_kat_menu = daftar_menu.kategori");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}

$select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu, kategori_makanan FROM kategori_menu");
?>
<!-- food section -->
</div>
<section class="food_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Menu Kami
      </h2>
    </div>

    <ul class="filters_menu">
      <li class="active" data-filter="*">All</li>
      <li data-filter=".Kebab">Kebab</li>
      <li data-filter=".Burger">Burger</li>
      <li data-filter=".Paket">Paket Serbu</li>

    </ul>

    <div class="filters-content">
      <div class="row grid">
        <?php foreach ($result as $row) { ?>
          <div class="col-sm-6 col-lg-4 all <?php echo  $row['kategori_makanan'] ?>">
            <div class="box">
              <div>
                <div class="img-box p-0" style='background-image: url("kebabtnt/assets/img/<?php echo $row['foto'] ?>"); background-size:cover; background-position: center;' >
                 
                </div>
                <div class="detail-box">
                  <h5>
                    <?php echo $row['nama_menu'] ?>
                  </h5>
                  <p>
                    <?php echo $row['keterangan'] ?>
                  </p>
                  <div class="options">
                    <h6>
                      <?php echo 'Rp ' . number_format((int) $row['harga'], 0, "," . '.') ?>
                    </h6>
                    <a href="kebabtnt" class="text-dark" style="text-decoration: none;">
                    <i class="bi bi-cart-fill"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      
              <div class="btn-box ">
                <a href="tentang" class="text-dark" style="text-decoration: none;">
                 Tahu Lebih Lanjut..
                </a>
              </div>
</section>

<!-- end food section -->