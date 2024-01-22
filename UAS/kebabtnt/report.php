<!-- CONTENT -->
<?php
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_order.*,tb_bayar.*,nama, SUM(harga*jumlah) AS harganya FROM tb_order
    LEFT JOIN user ON user.id = tb_order.pelayan
    LEFT JOIN tb_list_order ON tb_list_order.kode_order = tb_order.id_order
    LEFT JOIN daftar_menu ON daftar_menu.id = tb_list_order.menu
    JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
    GROUP BY id_order ORDER BY waktu_order ASC");

while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}

// $select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu, kategori_makanan FROM kategori_menu");
?>

<div class="col-lg-9 mt-2">
  <div class="card ">
    <div class="card-header ">
      HALAMAN REPORT
    </div>
    <div class="card-body bg-dark">


      <?php
      if (empty($result)) {
        echo "<span class='text-light'> DataReport Tidak Ada</span>";
      } else {
        ?>
        <div class="table-responsive text-light mt-3">
          <table class="table table-dark table-hover" id="example">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Order</th>
                <th scope="col">Waktu Order</th>
                <th scope="col">Waktu Bayar</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Meja</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Pelayan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($result as $row) {
                ?>
                <tr>
                  <th scope="row">
                    <?php echo $no++ ?>
                  </th>
                  <td>
                    <?php echo $row['id_order'] ?>
                  </td>
                  <td>
                    <?php echo $row['waktu_order'] ?>
                  </td>
                  <td>
                    <?php echo $row['waktu_bayar'] ?>
                  </td>
                  <td>
                    <?php echo $row['pelanggan'] ?>
                  </td>
                  <td>
                    <?php echo $row['meja'] ?>
                  </td>
                  <td>
                    <?php echo number_format((int)$row['harganya'],0,",".'.') ?>
                  </td>
                  <td>
                    <?php echo $row['nama'] ?>
                  </td>
         
                
                  <td>
                    <div class="d-flex">
                      <!-- VIEW -->
                      <a class="btn btn-info btn-sm me-1"
                        href="./?x=viewItem&order= <?php echo $row['id_order'] . "&meja=" . $row['meja'] . "&pelanggan=" . $row['pelanggan'] ?>"><i
                          class="bi bi-eye-fill"></i></a>
                    
                  </td>
                </tr>

                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <?php
      }
      ?>
    </div>
  </div>




  <!-- END CONTECT -->