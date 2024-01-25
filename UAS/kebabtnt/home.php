<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM daftar_menu");
while ($row = mysqli_fetch_array($query)) {
  $result[] = $row;
}

$query_chart = mysqli_query($conn,"SELECT nama_menu, daftar_menu.id, SUM(tb_list_order.jumlah) AS total_jumlah FROM daftar_menu 
LEFT JOIN tb_list_order ON daftar_menu.id = tb_list_order.menu
GROUP BY daftar_menu.id ASC");

$result_chart = array();
while ($record_chart = mysqli_fetch_array($query_chart)) {
  $result_chart[] = $record_chart;
}
$array_menu = array_column($result_chart, 'nama_menu');
$array_menu_quote = array_map(function($menu){
  return '"'. $menu. '"';
}, $array_menu);
$string_menu = implode(',',$array_menu_quote);
// echo $string_menu,"<br>";

$array_jumlah_pesanan = array_column($result_chart, 'total_jumlah');
$string_jumlah_pesanan = implode(',', $array_jumlah_pesanan);
// echo $string_jumlah_pesanan;

?>

<!-- CDN CHART -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- CONTENT -->
<div class="col-lg-9 mt-2">

  <!-- CAROUSEL -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <?php
      $slide = 0;
      $firstSlideButton = true;
      foreach ($result as $dataTombol) {
        ($firstSlideButton) ? $aktif = "active" : $aktif = "";
        $firstSlideButton = false;
        ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide ?>"
          class="<?php echo $aktif ?>" aria-current="true" aria-label="<?php echo $slide + 1 ?>"></button>
        <?php
        $slide++;
      } ?>
    </div>


    <div class="carousel-inner rounded">
      <?php
      $firstSlide = true;
      foreach ($result as $data) {
        ($firstSlide) ? $aktif = "active" : $aktif = "";
        $firstSlide = false;
        ?>
        <div class="carousel-item <?php echo $aktif ?>">
          <img src="assets/img/<?php echo $data['foto'] ?>" class="img-fluid" alt="..."
            style="width: 1000px; height:400px; object-fit: cover;">
          <div class="carousel-caption d-none d-md-block">
            <h5>
              <?php echo $data['nama_menu'] ?>
            </h5>
            <p>
              <?php echo $data['keterangan'] ?>
            </p>
          </div>
        </div>
      <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- JUDUL -->

  <div class="card mt-4 bg-dark text-light">
    <div class="card-body">
      <h5 class="card-title">SELAMAT DATANG DI DASHBOARD KEBAB BURGER TNT </h5>
      <p class="card-text">Segera kunjungi kami dan nikmati ledakan rasa di setiap gigitan. Resto Kebab Burger TNT adalah tempat di
            mana kebaikan kuliner dan kegembiraan bertemu dalam setiap hidangan yang kami sajikan. Selamat menikmati
            pengalaman kuliner yang luar biasa di TNT!</p>
      <a href="order" class="btn btn-warning">Pesan Sekarang</a>
    </div>
  </div>

<!-- END JUDUL -->
<!-- CHART -->

<div class="card mt-4 border-0 bg-dark ">
  <div class="card-body ">
    <div>
      <canvas id="myChart"></canvas>
    </div>
        
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [<?php echo $string_menu ?>],
      datasets: [{
        label: 'Jumlah Porsi Terjual',
        data: [<?php echo $string_jumlah_pesanan ?>],
        borderWidth: 1,
        backgroundColor:[
          'rgba(255, 123, 0, 0.8)',
          'rgba(0, 123, 255, 0.8)',
         'rgba(255, 210, 0, 0.8)',
          'rgba(255,  0, 123,0.8)',
          'rgba(70, 13, 255, 0.8)',
         'rgba( 210, 0,255, 0.8)',

        ]
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
  </div>
</div>
</div>
<!-- END AKHIR CHART -->