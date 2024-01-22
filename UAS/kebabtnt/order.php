<!-- CONTENT -->
<?php
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_order.*,tb_bayar.*,nama, SUM(harga*jumlah) AS harganya FROM tb_order
    LEFT JOIN user ON user.id = tb_order.pelayan
    LEFT JOIN tb_list_order ON tb_list_order.kode_order = tb_order.id_order
    LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
    LEFT JOIN daftar_menu ON daftar_menu.id = tb_list_order.menu
    GROUP BY id_order ORDER BY waktu_order DESC");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}

// $select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu, kategori_makanan FROM kategori_menu");
?>

<div class="col-lg-9 mt-2">
  <div class="card ">
    <div class="card-header ">
      HALAMAN ORDER
    </div>
    <div class="card-body bg-dark">
      <div class="row bg-dark">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahUser">Tambah Order</button>
        </div>
      </div>
      <!-- MODAL TMABH MENU BARU-->
      <div class="modal fade" id="modalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">TAMBAH ORDER MAKANAN</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="proses/proses_input_order.php" method="POST" class="needs-validation" novalidate>
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control " id="kodeorder" name="kode_order"
                        value="<?php echo date('ymdHi') . rand(100, 999) ?>" readonly>
                      <label for="kode_order">Kode Order</label>
                      <div class="invalid-feedback">
                        Masukkan kode order
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="meja" placeholder="Nomoer Meja" name="meja"
                        required>
                      <label for="meja">Meja</label>
                      <div class="invalid-feedback">
                        Masukkan Meja
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan"
                        name="pelanggan" required>
                      <label for="pelanggan">Nama Pelanggan</label>
                      <div class="invalid-feedback">
                        Masukkan Nama Pelanggan
                      </div>
                    </div>
                  </div>
                 
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_order_validate" value="123456">Buat
                    Order</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- AKHIR MODAL TAMBAH MENU BARU-->

      <?php
      if (empty($result)) {
        echo "<span class='text-light'> Data Order Tidak Ada </span>";
      } else {
        foreach ($result as $row) {

          ?>
          <!-- MODAL EDIT-->
          <div class="modal fade" id="modalEdit<?php echo $row['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">TAMBAH MENU MAKANAN</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="proses/proses_edit_order.php" method="POST" class="needs-validation" novalidate>
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-floating mb-3">
                      <input readonly type="text" class="form-control " id="kodeorder" name="kode_order"
                        value="<?php echo $row['id_order'] ?>" readonly>
                      <label for="kode_order">Kode Order</label>
                      <div class="invalid-feedback">
                        Masukkan kode order
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="meja" placeholder="Nomoer Meja" name="meja"
                          value="<?php echo $row['meja'] ?>">
                      <label for="meja">Meja</label>
                      <div class="invalid-feedback">
                        Masukkan Meja
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan"
                        name="pelanggan"  value="<?php echo $row['pelanggan'] ?>">
                      <label for="pelanggan">Nama Pelanggan</label>
                      <div class="invalid-feedback">
                        Masukkan Nama Pelanggan
                      </div>
                    </div>
                  </div>
                  
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="edit_order_validate" value="123456">Simpan</button>
                </div>
              </form>
                </div>

              </div>
            </div>
          </div>
          <!-- AKHIR MODAL EDIT-->

          <!-- MODAL DELETE-->
          <div class="modal fade" id="modalDelete<?php echo $row['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE DATA </h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="proses/proses_delete_order.php" method="POST" class="needs-validation" novalidate>
                    <input type="hidden" value="<?php echo $row['id_order'] ?>" name="kode_order">
                    <div class="col-lg-12">
                      Apakah Anda ingin menghapus Order nama pelanggan   <b>
                        <?php echo $row['pelanggan'] ?>
                      </b> dan kode order <b>
                        <?php echo $row['id_order'] ?>
                      </b> 
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger" name="delete_order_validate" value="123456">Hapus</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
          <!-- AKHIR MODAL DELETE-->



          <?php
        }

        ?>
        <div class="table-responsive text-light mt-3">
          <table class="table table-dark table-hover" id="example">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Order</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Meja</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Pelayan</th>
                <th scope="col">Status</th>
                <th scope="col">Waktu Order</th>
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
                    <?php  echo !(empty($row['id_bayar']) ) ? '<span class="badge text-bg-success" >terbayar </span>':'<span class="badge " >belum bayar </span>';?>
                  </td>
                  <td>
                    <?php echo $row['waktu_order'] ?>
                  </td>

                  <td>
                    <div class="d-flex">
                      <!-- VIEW -->
                      <a class="btn btn-info btn-sm me-1"
                        href="./?x=orderitem&order= <?php echo $row['id_order'] . "&meja=" . $row['meja'] . "&pelanggan=" . $row['pelanggan'] ?>"><i
                          class="bi bi-eye-fill"></i></a>
                      <!-- UPDATE -->
                      <button class=" <?php echo !(empty($row['id_bayar']) ) ? 'btn btn-secondary disabled':'btn btn-warning'; ?> btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#modalEdit<?php echo $row['id_order'] ?>"><i
                          class="bi bi-pencil-square"></i></button>
                      <!-- DELETE -->
                      <button class=" <?php echo !(empty($row['id_bayar']) ) ? 'btn btn-secondary disabled':'btn btn-danger'; ?> btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#modalDelete<?php echo $row['id_order'] ?>"><i
                          class="bi bi-trash3-fill"></i></button>

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