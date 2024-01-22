<!-- CONTENT -->
<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM kategori_menu");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}
?>

<div class="col-lg-9 mt-2">
  <div class="card ">
    <div class="card-header ">
      HALAMAN KATEGORI MENU
    </div>
    <div class="card-body bg-dark">
      <div class="row bg-dark">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahUser">Tambah Kategori
            Menu</button>
        </div>
      </div>
      <!-- MODAL TMABH KATEGORI BARU-->
      <div class="modal fade" id="modalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">TAMBAH KATEGORI</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="proses/proses_input_katmenu.php" method="POST" class="needs-validation" novalidate>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <select class="form-select" name="jenis_menu" id="">
                        <option value="1">Makanan</option>
                        <option value="2">Minuman</option>
                      </select>
                      <label for="floatingInput">Jenis Menu</label>
                      <div class="invalid-feedback">
                        Masukkan Jenis Menu
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                        name="katmenu" required>
                      <label for="floatingInput">Kategori Menu</label>
                      <div class="invalid-feedback">
                        Masukkan Kategori Menu
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_katmenu_validate" value="123456">Save
                    changes</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- AKHIR MODAL TMABH KATEGORI BARU-->

      <?php
      if (empty($result)) {
        echo "";}
        else{
      foreach ($result as $row) {

        ?>
        <!-- MODAL EDIT-->
        <div class="modal fade" id="modalEdit<?php echo $row['id_kat_menu'] ?>" tabindex="-1"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> EDIT DATA KATEGORI</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="proses/proses_edit_katmenu.php" method="POST" class="needs-validation" novalidate>
                  <input type="hidden" value="<?php echo $row['id_kat_menu'] ?>" name="id">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <select name="jenis_menu" class="form-select" aria-label="Default select example" id="">
                          <?php
                          $data = array("Makanan", "Minuman");
                          foreach ($data as $key => $value) {
                            if ($row["jenis_menu"] == $key + 1) {
                              echo "<option selected value=" . ($key + 1) . ">$value</option>";
                            } else {
                              echo "<option  value=" . ($key + 1) . " > $value</option>";
                            }
                          }
                          ?>
                        </select>
                        <label for="floatingInput">Jenis Menu</label>
                        <div class="invalid-feedback">
                          Masukkan Jenis Menu
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                          name="katmenu" required value="<?php echo $row['kategori_makanan'] ?>">
                        <label for="floatingInput">Kategori Menu</label>
                        <div class="invalid-feedback">
                          Masukkan Kategori Menu
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="input_katmenu_validate" value="123456">Save
                      changes</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- AKHIR MODAL EDIT-->

        <!-- MODAL DELETE-->
        <div class="modal fade" id="modalDelete<?php echo $row['id_kat_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-md modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE DATA KATEGORI MENU</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="proses/proses_delete_katmenu.php" method="POST" class="needs-validation" novalidate>
                  <input type="hidden" value="<?php echo $row['id_kat_menu'] ?>" name="id">
                  <div class="col-lg-12">
                   Apakah Anda ingin menghapus kategori <b><?php echo $row['kategori_makanan']  ?> </b>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="hapus_kategori_validate" value="123456" >Hapus</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- AKHIR MODAL DELETE-->

        <?php
      }}
      if (empty($result)) {
        echo "<p class='text-light'> Data Kategori Menu Tidak Ada</p>";
      } else {
        ?>

        <!-- TABLE DAFTAR KATEGORI -->
        <div class="table-responsive text-light mt-3">
          <table class="table table-dark table-hover" id="example">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis</th>
                <th scope="col">Kategori</th>
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
                    <?php echo ($row['jenis_menu'] == 1) ? "Makanan" : "Minuman"; ?>
                  </td>
                  <td>
                    <?php echo $row['kategori_makanan'] ?>
                  </td>

                  <td class="d-flex ">

                    <!-- UPDATE -->
                    <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                      data-bs-target="#modalEdit<?php echo $row['id_kat_menu'] ?>"><i
                        class="bi bi-pencil-square"></i></button>
                    <!-- DELETE -->
                    <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                      data-bs-target="#modalDelete<?php echo $row['id_kat_menu'] ?>"><i
                        class="bi bi-trash3-fill"></i></button>

                  </td>
                </tr>

                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- AKHIR TABLE DAFTAR KATEGORI -->
        <?php
      }
      ?>
    </div>
  </div>




  <!-- END CONTECT -->