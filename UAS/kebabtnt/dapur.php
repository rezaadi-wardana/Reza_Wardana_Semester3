<!-- CONTENT -->
<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM tb_list_order
    LEFT JOIN tb_order ON tb_order.id_order = tb_list_order.kode_order
    LEFT JOIN daftar_menu ON daftar_menu.id = tb_list_order.menu
    LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order ORDER BY waktu_order ASC");

while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
  //   $kode = $record['id_order'];
//   $meja = $record['meja'];
//   $pelanggan = $record['pelanggan'];
}

$select_menu = mysqli_query($conn, "SELECT id,nama_menu FROM daftar_menu");
?>

<div class="col-lg-9 mt-2">
  <div class="card ">
    <div class="card-header ">
      HALAMAN DAPUR
    </div>
    <div class="card-body bg-dark">

      <?php
      if (empty($result)) {
        echo "<span class='text-light'> Data Dapur Tidak Ada </span>";
      } else {

        foreach ($result as $row) {

          ?>
          <!--MODAL TERIMA DAPUR-->
          <div class="modal fade" id="terima<?php echo $row['id_list_order'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">TAMBAH MENU MAKANAN</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="proses/proses_terima_orderitem.php" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
              <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                    <div class="row">
                      <div class="col-lg-8">
                        <div class="form-floating mb-3">
                          <select disabled class="form-select" name="menu" id="">
                            <!-- <option value="" selected hidden> PIlih Menu</option> -->
                            <?php
                            foreach ($select_menu as $value) {
                              if ($row['menu'] == $value['id']) {
                                echo "<option selected value=".$value['id'].">$value[nama_menu]</option>";
                              } else {
                                echo "<option value=".$value['id'].">$value[nama_menu]</option>";
                              }

                            }
                            ;
                            ?>
                          </select>
                          <label for="menu">Menu Makanan/Minuman</label>
                          <div class="invalid-feedback">
                            Masukkan Menu
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <input disabled type="number" class="form-control" id="floatingInput" placeholder="Jumlah" name="jumlah"
                            value="<?php echo $row['jumlah'] ?>" required>
                          <label for="floatingInput">Jumlah Porsi </label>
                          <div class="invalid-feedback">
                            Masukkan Jumlah Porsi
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="floatingPassword" placeholder="Catatan" name="catatan"
                            value="<?php echo $row['catatan'] ?>">
                          <label for="floatingInput">Catatan</label>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="terima_orderitem_validate" value="123456">Terima</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
          <!-- AKHIR MODAL TERIMA-->

          <!--MODAL SIAP SAJI-->
          <div class="modal fade" id="siapsaji<?php echo $row['id_list_order'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">SIAP SAJI</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="proses/proses_siapsaji_orderitem.php" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
              <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                    <div class="row">
                      <div class="col-lg-8">
                        <div class="form-floating mb-3">
                          <select disabled class="form-select" name="menu" id="">
                            <option value="" selected hidden> PIlih Menu</option>
                            <?php
                            foreach ($select_menu as $value) {
                              if ($row['menu'] == $value['id']) {
                                echo "<option selected value='$value[id]'>$value[nama_menu]</option>";
                              } else {
                                echo "<option value='$value[id]'>$value[nama_menu]</option>";
                              }

                            }
                            ;
                            ?>
                          </select>
                          <label for="menu">Menu Makanan/Minuman</label>
                          <div class="invalid-feedback">
                            Masukkan Menu
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <input disabled type="number" class="form-control" id="floatingInput" placeholder="Jumlah" name="jumlah"
                            value="<?php echo $row['jumlah'] ?>" required>
                          <label for="floatingInput">Jumlah Porsi </label>
                          <div class="invalid-feedback">
                            Masukkan Jumlah Porsi
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="floatingPassword" placeholder="Catatan" name="catatan"
                            value="<?php echo $row['catatan'] ?>">
                          <label for="floatingInput">Catatan</label>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="siapsaji_orderitem_validate" value="123456">Siap Saji</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
          <!-- AKHIR MODAL SIAP SAJI-->

        
          <?php
        }
        ?>
    

    <div class="table-responsive text-light mt-3">
          <table class="table table-dark table-hover" id="example">
            <thead>
              <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Kode Order</th>
                <th scope="col">Waktu Order</th>
                <th scope="col">Menu</th>
                <th scope="col">Qty</th>
                <th scope="col">Catatan</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($result as $row) {
                if ($row['status'] != 2) {

                ?>
                <tr>
                  <td>
                    <?php echo $no++ ?>
                  </td>
                  <td>

                    <?php echo $row['kode_order'] ?>
                  </td>
                  <td>
                    <?php echo $row['waktu_order'] ?>
                  </td>
                  <td>
                    <?php echo $row['nama_menu'] ?>
                  </td>
                  <td>
                    <?php echo $row['jumlah'] ?>
                  </td>
                  <td>
                    <?php echo $row['catatan'] ?>
                  </td>
                  <td>
                    <?php  if($row['status']==1){
                      echo "<span class='badge text-bg-warning'> Masuk Dapur</span>" ;
                    }elseif($row['status']==2){
                      echo "<span class='badge text-bg-success'> Siap Saji</span>" ;
                    } ?>
                  </td>

                  <td>
                    <div class="d-flex">

                      <!-- UPDATE -->
                      <button
                        class=" <?php echo (!empty($row['status'])) ? 'btn btn-secondary disabled' : 'btn btn-primary';  ?> text-nowrap  btn-sm me-1"
                        data-bs-toggle="modal" data-bs-target="#terima<?php echo $row['id_list_order'] ?>">Terima</button>
                      <!-- DELETE -->
                      <button
                        class=" <?php echo (empty($row['status']) || $row['status']!=1) ? 'btn btn-secondary disabled' : 'btn btn-success'; ?> text-nowrap btn-sm me-1"
                        data-bs-toggle="modal" data-bs-target="#siapsaji<?php echo $row['id_list_order'] ?>">Pesanan Siap</button>

                  </td>
                </tr>

                <?php

              }}
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