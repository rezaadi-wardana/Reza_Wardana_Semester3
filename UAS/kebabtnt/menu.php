<!-- CONTENT -->
<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM daftar_menu
    LEFT JOIN kategori_menu ON kategori_menu.id_kat_menu = daftar_menu.kategori");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}

$select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu, kategori_makanan FROM kategori_menu");
?>

<div class="col-lg-9 mt-2">
  <div class="card ">
    <div class="card-header ">
      HALAMAN MENU
    </div>
    <div class="card-body bg-dark">
      <div class="row bg-dark">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahUser">Tambah Menu</button>
        </div>
      </div>
      <!-- MODAL TMABH MENU BARU-->
      <div class="modal fade" id="modalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">TAMBAH MENU MAKANAN</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="proses/proses_input_menu.php" method="POST" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="input-group mb-3">
                      <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your name" name="foto"
                        required>
                      <label for="uploadFoto" class="input-group-text">Upload Foto Menu</label>
                      <div class="invalid-feedback">
                        Masukkan File Foto
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu"
                        name="nama_menu" required>
                      <label for="floatingInput">Nama Menu</label>
                      <div class="invalid-feedback">
                        Masukkan Nama Menu
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingPassword" placeholder="Keterangan"
                        name="keterangan">
                      <label for="floatingInput">Keterangan</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <select class="form-select" aria-label="Default select example" name="kat_menu" id="qqq" required>
                        <?php
                        foreach ($select_kat_menu as $value) {
                          echo "<option value=" . $value['id_kat_menu'] . ">$value[kategori_makanan]</option>";
                        }
                        ?>
                      </select>
                      <label for="qqq">Kategori Makanan</label>
                      <div class="invalid-feedback">
                        <input type="text">
                        Pilih Kategori Makanan
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga"
                        required>
                      <label for="floatingInput">Harga</label>
                      <div class="invalid-feedback">
                        Masukkan Harga Makanan
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="Stok" name="stok"
                        required>
                      <label for="floatingInput">Stok</label>
                      <div class="invalid-feedback">
                        Masukkan Stok Makanan
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_menu_validate" value="123456">Save
                    changes</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- AKHIR MODAL TAMBAH MENU BARU-->

      <?php
            if (empty($result)) {
              echo "<span class='text-light'> Data Makanan atau Minuman Tidak ada</span>";
            } else {
      foreach ($result as $row) {
        ?>
        <!-- MODAL VIEW-->
        <div class="modal fade" id="modalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Menu Makanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body bg-secondary">
                <form action="proses/proses_input_menu.php" method="POST" enctype="multipart/form-data"
                  class="needs-validation" novalidate>
                  <div class="row justify-content-center">

                    <div class="col-lg-5">
                      <div class="col-lg-12">
                        <div class="input-group mb-3">
                          <img src="assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">

                        </div>
                      </div>
                    </div>


                    <div class="col-lg-6 align-items-top">
                      <div class="col-lg-12 ">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="floatingInput"
                            value="<?php echo $row['nama_menu'] ?>">
                          <label for="floatingInput">Nama Menu</label>

                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input disabled type="text" class="form-control" id="floatingPassword"
                            value="<?php echo $row['keterangan'] ?>">
                          <label for="floatingInput">Keterangan</label>
                        </div>

                      </div>
            
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input disabled type="number" class="form-control" id="floatingInput"
                            value="<?php echo $row['harga'] ?>">
                          <label for="floatingInput">Harga</label>
                          <div class="invalid-feedback">
                            Masukkan Harga Makanan
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <input disabled type="number" class="form-control" id="floatingInput"
                            value="<?php echo $row['stok'] ?>">
                          <label for="floatingInput">Stok</label>
                          <div class="invalid-feedback">
                            Masukkan Stok Makanan
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-floating mb-3">
                          <select disabled class="form-select" aria-label="Default select example" required
                            value="<?php echo $row['kategori'] ?>" >
                            <option selected hidden value="">Pilih Kategori Menu</option>
                            <?php
                            foreach ($select_kat_menu as $value) {
                              if ($row['kategori'] == $value['id_kat_menu']) {
                                echo "<option selected value=" . $value['id_kat_menu'] . ">$value[kategori_makanan]</option>";
                              } else {
                                echo "<option value=" . $value['id_kat_menu'] . ">$value[kategori_makanan]</option>";

                              }
                            }
                            ?>
                          </select>
                          <label for="floatingInput">Kategori Makanan</label>
                          <div class="invalid-feedback">
                            Pilih Kategori Makanan
                          </div>
                        </div>
                      </div>

                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="input_menu_validate" value="123456">Save
                      changes</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- AKHIR MODAL VIEW-->
        <?php
      }
      foreach ($result as $row) {

        ?>
        <!-- MODAL EDIT-->
        <div class="modal fade" id="modalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">TAMBAH MENU MAKANAN</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="proses/proses_edit_menu.php" method="POST" enctype="multipart/form-data"
                  class="needs-validation" novalidate>
                  <input type="hidden" value ="<?php echo $row['id'] ?>" name="id">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="input-group mb-3">
                        <input required type="file" class="form-control py-3" id="uploadFoto" placeholder="Your name" name="foto">

                        <label for="uploadFoto" class="input-group-text">Upload Foto Menu</label>
                        <div class="invalid-feedback">
                          Masukkan File Foto
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input required type="text" class="form-control" id="floatingInput" placeholder="Nama Menu"
                          name="nama_menu" value="<?php echo $row['nama_menu'] ?>" >
                        <label for="floatingInput">Nama Menu</label>
                        <div class="invalid-feedback">
                          Masukkan Nama Menu
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingPassword" placeholder="Keterangan"
                          name="keterangan" value="<?php echo $row['keterangan'] ?>">
                        <label for="floatingInput">Keterangan</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Default select example" name='kat_menu'>
                          <option selected hidden>Pilih Kategori Menu</option>
                          <?php
                          foreach ($select_kat_menu as $value) {
                            if ($row['kategori'] == $value['id_kat_menu']) {
                              echo "<option selected value=" . $value['id_kat_menu'] . ">$value[kategori_makanan]</option>";
                            } else {
                              echo "<option value=" . $value['id_kat_menu'] . ">$value[kategori_makanan]</option>";

                            }
                          }
                          ?>
                        </select>
                        <label for="floatingInput">Kategori Makanan</label>
                        <div class="invalid-feedback">
                          Pilih Kategori Makanan
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga"
                          required value="<?php echo $row['harga'] ?>">
                        <label for="floatingInput">Harga</label>
                        <div class="invalid-feedback">
                          Masukkan Harga Makanan
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="Stok" name="stok"
                          required value="<?php echo $row['stok'] ?>">
                        <label for="floatingInput">Stok</label>
                        <div class="invalid-feedback">
                          Masukkan Stok Makanan
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="input_menu_validate" value="123456">Save
                      changes</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- AKHIR MODAL EDIT-->

        <!-- MODAL DELETE-->
        <div class="modal fade" id="modalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-md modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE DATA USER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="proses/proses_delete_menu.php" method="POST" class="needs-validation" novalidate>
                  <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                  <input type="hidden" value="<?php echo $row['foto'] ?>" name="foto">
                  <div class="col-lg-12">
                          Apakah Anda ingin menghapus menu <b><?php echo $row['nama_menu'] ?></b>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="delete_mwnu_validate" value="123456">Hapus</button>
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
                <th scope="col">Foto Menu</th>
                <th scope="col">Nama</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Jenis menu</th>
                <th scope="col">Kategori</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
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
                    <div style="width: 80px;">
                    </div>
                    <img src="assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                  </td>
                  <td>
                    <?php echo $row['nama_menu'] ?>
                  </td>
                  <td>
                    <?php echo $row['keterangan'] ?>
                  </td>
                  <td>
                    <?php echo ($row['jenis_menu'] == 1) ? "Kebab" : "Burger" ?>
                  </td>
                  <td>
                    <?php echo $row['kategori_makanan'] ?>
                  </td>
                  <td>
                    <?php echo $row['harga'] ?>
                  </td>
                  <td>
                    <?php echo $row['stok'] ?>
                  </td>
                  <td>
                    <div class="d-flex">
                      <!-- VIEW -->
                      <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#modalView<?php echo $row['id'] ?>"><i class="bi bi-eye-fill"></i></button>
                      <!-- UPDATE -->
                      <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#modalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                      <!-- DELETE -->
                      <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                        data-bs-target="#modalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash3-fill"></i></button>

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