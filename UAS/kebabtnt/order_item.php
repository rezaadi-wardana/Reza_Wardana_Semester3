<!-- CONTENT -->
<div class="container-lg">
<div class="row  mb-5">
  <?php
  include "proses/connect.php";

  include "sidebar.php";

  $query = mysqli_query($conn, "SELECT *, SUM(harga*jumlah) AS harganya, tb_order.waktu_order FROM tb_list_order
    LEFT JOIN tb_order ON tb_order.id_order = tb_list_order.kode_order
    LEFT JOIN daftar_menu ON daftar_menu.id = tb_list_order.menu
    LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
    GROUP BY id_list_order
    HAVING tb_list_order.kode_order = $_GET[order]");


  $kode = $_GET['order'];
  $meja = $_GET['meja'];
  $pelanggan = $_GET['pelanggan'];

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
        HALAMAN ORDER ITEM
      </div>
      <div class="card-body bg-dark">
        <a href="order" class="btn btn-primary mb-3"><i class="bi bi-caret-left-fill"></i> Kembali</a>
        <div class="row bg-dark">
          <div class="col-lg-3">
            <div class="form-floating mb-3">
              <input disabled type="text" class="form-control " id="kodeorder" value="<?php echo $kode; ?>">
              <label for="uploadFoto">Kode Order</label>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="form-floating mb-3">
              <input disabled type="text" class="form-control " id="meja" value="<?php echo $meja; ?>">
              <label for="uploadFoto">Meja</label>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-floating mb-3">
              <input disabled type="text" class="form-control " id="pelanggan" value="<?php echo $pelanggan; ?>">
              <label for="uploadFoto">Pelanggan</label>
            </div>
          </div>

        </div>
        <!-- MODAL TaMABH ITEM-->
        <div class="modal fade" id="tambahItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">TAMBAH MENU MAKANAN</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="proses/proses_input_orderitem.php" method="POST" enctype="multipart/form-data"
                  class="needs-validation" novalidate>
                  <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                  <input type="hidden" name="meja" value="<?php echo $meja ?>">
                  <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-floating mb-3">
                        <select class="form-select" name="menu" id="">
                          <option value="" selected hidden> PIlih Menu</option>
                          <?php
                          foreach ($select_menu as $value) {
                            echo "<option value=$value[id]>$value[nama_menu]</option>";
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
                        <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah" name="jumlah"
                          required>
                        <label for="floatingInput">Jumlah Porsi </label>
                        <div class="invalid-feedback">
                          Masukkan Jumlah Porsi
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingPassword" placeholder="Catatan"
                          name="catatan">
                        <label for="floatingInput">Catatan</label>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="input_orderitem_validate" value="123456">Save
                      changes</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- AKHIR MODAL TAMBAH ITEM-->

        <?php
        if (empty($result)) {
          echo "<span class='text-light'> Data Makansn stsu minumsn tidak ada</span>";
        } else {

          foreach ($result as $row) {

            ?>
            <!-- MODAL EDIT-->
            <div class="modal fade" id="modalEdit<?php echo $row['id_list_order'] ?>" tabindex="-1"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">TAMBAH MENU MAKANAN</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="proses/proses_edit_orderitem.php" method="POST" enctype="multipart/form-data"
                      class="needs-validation" novalidate>
                      <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                      <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                      <input type="hidden" name="meja" value="<?php echo $meja ?>">
                      <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                      <div class="row">
                        <div class="col-lg-8">
                          <div class="form-floating mb-3">
                            <select class="form-select" name="menu" id="">
                              <option value="" selected hidden> PIlih Menu</option>
                              <?php
                              foreach ($select_menu as $value) {
                                if ($row['menu'] == $value['id']) {
                                  echo "<option value=$value[id]>$value[nama_menu]</option>";
                                } else {
                                  echo "<option value=$value[id]>$value[nama_menu]</option>";
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
                            <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah" name="jumlah"
                              value="<?php echo $row['jumlah'] ?>" required>
                            <label for="floatingInput">Jumlah Porsi </label>
                            <div class="invalid-feedback">
                              Masukkan Jumlah Porsi
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="Catatan"
                              name="catatan" value="<?php echo $row['catatan'] ?>">
                            <label for="floatingInput">Catatan</label>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit_orderitem_validate" value="123456">Save
                          changes</button>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>
            <!-- AKHIR MODAL EDIT-->

            <!-- MODAL DELETE-->
            <div class="modal fade" id="modalDelete<?php echo $row['id_list_order'] ?>" tabindex="-1"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md modal-fullscreen-md-down">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE DATA USER</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="proses/proses_delete_orderitem.php" method="POST" class="needs-validation" novalidate>
                      <input type="hidden" value="<?php echo $row['id_list_order'] ?>" name="id">
                      <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                      <input type="hidden" name="meja" value="<?php echo $meja ?>">
                      <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                      <div class="col-lg-12">
                        Apakah Anda ingin menghapus menu <b>
                          <?php echo $row['nama_menu'] ?>
                        </b>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="delete_orderitem_validate"
                          value="123456">Hapus</button>
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
          <!-- MODAL BAYAR-->
          <div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fullscreen-md-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">PEMBAYARAN</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <div class="table-responsive">
                    <table class="table table-dark table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Menu</th>
                          <th scope="col">Harga</th>
                          <th scope="col">Qty</th>
                          <th scope="col">Status</th>
                          <th scope="col">Catatan</th>
                          <th scope="col">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $total = 0;
                        foreach ($result as $row) {
                          ?>
                          <tr>
                            <td>
                              <?php echo $row['nama_menu'] ?>
                            </td>
                            <td>

                              <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                            </td>
                            <td>
                              <?php echo $row['jumlah'] ?>
                            </td>
                            <td>
                              <?php echo $row['status'] ?>
                            </td>
                            <td>
                              <?php echo $row['catatan'] ?>
                            </td>
                            <td>

                              <?php echo number_format($row['harganya'], 0, ',', '.'); ?>

                            </td>
                          </tr>

                          <?php
                          $total += $row['harganya'];
                        }
                        ?>
                        <tr>
                          <td colspan="5" class="fw-bold">
                            Total Harga
                          </td>
                          <td class="fw-bold">
                            <?php echo number_format($total, 0, ',', '.'); ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                  <span class="text-danger fs-5 fw-semibold">Apakah Anda Yakin Iigin Melakukan Pembayaran? </span>
                  <form action="proses/proses_bayar.php" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                    <input type="hidden" name="meja" value="<?php echo $meja ?>">
                    <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                    <input type="hidden" name="total" value="<?php echo $total ?>">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input type="number" class="form-control" id="floatingInput" placeholder="Nominal Uang"
                            name="uang" required>
                          <label for="floatingInput">Jumlah Uang </label>
                          <div class="invalid-feedback">
                            Masukkan JNominal Uang
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="bayar_validate" value="123456">Bayar</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
          <!-- AKHIR MODAL BAYAR-->

          <div class="table-responsive">
            <table class="table table-dark table-hover">
              <thead>
                <tr>
                  <th scope="col">Menu</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Status</th>
                  <th scope="col">Catatan</th>
                  <th scope="col">Total</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $total = 0;
                foreach ($result as $row) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $row['nama_menu'] ?>
                    </td>
                    <td>

                      <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                    </td>
                    <td>
                      <?php echo $row['jumlah'] ?>
                    </td>
                    <td>
                      <?php if ($row['status'] == 1) {
                        echo "<span class='badge text-bg-warning'> Masuk Dapur</span>";
                      } elseif ($row['status'] == 2) {
                        echo "<span class='badge text-bg-success'> Siap Saji</span>";
                      } ?>
                    </td>
                    <td>
                      <?php echo $row['catatan'] ?>
                    </td>
                    <td>

                      <?php echo number_format($row['harganya'], 0, ',', '.'); ?>

                    </td>


                    <td>
                      <div class="d-flex">

                        <!-- UPDATE -->
                        <button
                          class=" <?php echo !(empty($row['id_bayar'])) ? 'btn btn-secondary disabled' : 'btn btn-warning'; ?> btn-sm me-1"
                          data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $row['id_list_order'] ?>"><i
                            class="bi bi-pencil-square"></i></button>
                        <!-- DELETE -->
                        <button
                          class=" <?php echo !(empty($row['id_bayar'])) ? 'btn btn-secondary disabled' : 'btn btn-danger'; ?> btn-sm me-1"
                          data-bs-toggle="modal" data-bs-target="#modalDelete<?php echo $row['id_list_order'] ?>"><i
                            class="bi bi-trash3-fill"></i></button>

                    </td>
                  </tr>

                  <?php
                  $total += $row['harganya'];
                }
                ?>
                <tr>
                  <td colspan="5" class="fw-bold">
                    Total Harga
                  </td>
                  <td class="fw-bold">
                    <?php echo number_format($total, 0, ',', '.'); ?>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
          <?php
        }
        ?>
        <div>
          <button class=" <?php echo !(empty($row['id_bayar'])) ? 'btn btn-secondary disabled' : 'btn btn-success'; ?>"
            data-bs-toggle="modal" data-bs-target="#tambahItem"><i class="bi bi-plus-circle-fill"></i> Tambah
            Item</button>
          <button class=" <?php echo !(empty($row['id_bayar'])) ? 'btn btn-secondary disabled' : 'btn btn-warning'; ?>"
            data-bs-toggle="modal" data-bs-target="#bayar"><i class="bi bi-cash-coin"></i>
            Bayar</button>
          <button onclick="printStruk()" class=" btn btn-info" data-bs-toggle="modal" data-bs-target=""><i
              class="bi bi-cash-coin"></i>
            Cetak Struk</button>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- END CONTECT -->


  <!-- CETAK STRUK -->

  <div id="strukContent" class="d-none">
    <style>
      #struk {
        font-size: 12px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        max-width: 300px;
        border: 1px solid #ccc;
        padding: 10px;
        width: 60mm;

      }

      #struk h2 {
        text-align: center;
        color: #333;
        line-height: 2px;
      }

      #struk p {
        margin: 5px 0;
      }

      #struk table {
        font-size: 12px;
        border-collapse: collapse;
        margin-top: 10px;
        width: 100%;
      }

      #struk th,
      #struk td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
      }

      #struk .total {
        font-weight: bold;
      }

      #struk .harga {
        text-align: right;

      }
    </style>
    <div id="struk">

      <h2>STRUK PEMBAYARAN</h2>
      <h2>Kebab & Burger TNT</h2>
      <hr>
      <hr>
      <p>Kode Order :
        <?php echo $kode ?>
      </p>
      <p>Meja :
        <?php echo $meja ?>
      </p>
      <p>Pelanggan :
        <?php echo $pelanggan ?>
      </p>
      <p>Waktu Order :
        <?php echo date('d/m/Y H:i:s', strtotime($result[0]['waktu_order'])) ?>
      </p>


      <table>
        <thead>
          <tr>
            <th>Menu</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $Total = 0;
          foreach ($result as $row) { ?>
            <tr>
              <td>
                <?php echo $row['nama_menu'] ?>
              </td>
              <td>
                <?php echo number_format($row['harga'], 0, ',', '.') ?>
              </td>
              <td>
                <?php echo $row['jumlah'] ?>
              </td>
              <td class="harga">
                <?php echo number_format($row['harganya'], 0, ',', '.') ?>
              </td>
            </tr>
            <?php
            $Total += $row['harganya'];
          } ?>
          <tr class="total">
            <td colspan="3">Total Harga</td>
            <td>
              <?php echo number_format($Total, 0, ',', '.') ?>
            </td>
          </tr>
        </tbody>
      </table>
      <hr>
      <p style="text-align: center;">🙏Terimakasih Telah Order🙏</p>
    </div>
  </div>

  <script>
    function printStruk() {
      var strukContent = document.getElementById("strukContent").innerHTML;
      var printFrame = document.createElement("iframe");
      printFrame.style.display = "none";
      document.body.appendChild(printFrame);
      printFrame.contentDocument.write(strukContent);
      printFrame.contentWindow.print();
      document.body.removeChild(printFrame);
    }
  </script>

  <!-- akhirCETAK STRUK -->