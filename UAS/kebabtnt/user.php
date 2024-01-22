<!-- CONTENT -->
<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM user");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}
?>

<div class="col-lg-9 mt-2">
  <div class="card ">
    <div class="card-header ">
      HALAMAN USER
    </div>
    <div class="card-body bg-dark">
      <div class="row bg-dark">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahUser">Tambah User</button>
        </div>
      </div>
      <!-- MODAL TMABH USER BARU-->
      <div class="modal fade" id="modalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">TAMBAH USER</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="proses/proses_input_user.php" method="POST" class="needs-validation" novalidate>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="Your name" name="nama"
                        required>
                      <label for="floatingInput">Nama</label>
                      <div class="invalid-feedback">
                        Masukkan Nama
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                        name="username" required>
                      <label for="floatingInput">Username/Email</label>
                      <div class="invalid-feedback">
                        Masukkan Email
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <select class="form-select" aria-label="Default select example" name="level" required>
                        <option selected hidden value="">Pilih Level User</option>
                        <option value="1">Owner/Admin</option>
                        <option value="2">Penjual</option>
                        <option value="3">Pelanggan</option>
                      </select>
                      <label for="floatingInput">Label User</label>
                      <div class="invalid-feedback">
                        Pilih Level User
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxx" name="nohp">
                      <label for="floatingInput">Nomor Handphone</label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Passworde" disabled
                      value="12345" name="password">
                    <label for="floatingInput">Password</label>
                  </div>
                </div>
                <div class="form-floating">
                  <textarea class="form-control" name="alamat" id="" style="height:100px"></textarea>
                  <label for="floatingInput">Alamat</label>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="input_user_validate" value="123456">Save
                    changes</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- AKHIR MODAL TMABH USER BARU-->

      <?php
      foreach ($result as $row) {
        ?>
        <!-- MODAL VIEW-->
        <div class="modal fade" id="modalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> DATA USER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="proses/proses_input_user.php" method="POST" class="needs-validation" novalidate>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your name"
                          name="nama" value="<?php echo $row['nama'] ?>">
                        <label for="floatingInput">Nama</label>
                        <div class="invalid-feedback">
                          Masukkan Nama
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input disabled type="email" class="form-control" id="floatingInput"
                          placeholder="name@example.com" name="username" value="<?php echo $row['username'] ?>">
                        <label for="floatingInput">Username/Email</label>
                        <div class="invalid-feedback">
                          Masukkan Email
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-floating mb-3">
                        <select disabled name="level" class="form-select" aria-label="Default select example" id="">
                          <?php
                          $data = array("Owner/Admin", "Penjual", "Pelanggan");
                          foreach ($data as $key => $value) {
                            if ($row["level"] == $key + 1) {
                              echo "<option selected value=" . ($key + 1) . ">$value</option>";
                            } else {
                              echo "<option value=" . ($key + 1) . " > $value</option>";
                            }
                          }
                          ?>
                        </select>
                        <label for="floatingInput">Label User</label>
                        <div class="invalid-feedback">
                          Pilih Level User
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="form-floating mb-3">
                        <input disabled type="number" class="form-control" id="floatingInput" placeholder="08xxxxx"
                          name="nohp" value="<?php echo $row['nohp'] ?>">
                        <label for="floatingInput">Nomor Handphone</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-floating">
                    <textarea disabled class="form-control" name="alamat" id=""
                      style="height:100px"><?php echo $row['alamat'] ?></textarea>
                    <label for="floatingInput">Alamat</label>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

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
                <h1 class="modal-title fs-5" id="exampleModalLabel"> EDIT DATA USER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="proses/proses_edit_user.php" method="POST" class="needs-validation" novalidate>
                  <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input  type="text" class="form-control" id="floatingInput" placeholder="Your name" name="nama"
                          value="<?php echo $row['nama'] ?>">
                        <label for="floatingInput">Nama</label>
                        <div class="invalid-feedback">
                          Masukkan Nama
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input <?php echo ($row['username'] == $_SESSION['username_kebabtnt']) ? 'disabled' : '' ?> required type="email" class="form-control" id="floatingInput"
                          placeholder="name@example.com" name="username" value="<?php echo $row['username'] ?>">
                        <label for="floatingInput">Username/Email</label>
                        <div class="invalid-feedback">
                          Masukkan Email
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-floating mb-3">
                        <select name="level" class="form-select" aria-label="Default select example" id="">
                          <?php
                          $data = array("Owner/Admin", "Penjual", "Pelanggan");
                          foreach ($data as $key => $value) {
                            if ($row["level"] == $key + 1) {
                              echo "<option selected value=" . ($key + 1) . ">$value</option>";
                            } else {
                              echo "<option value=" . ($key + 1) . " > $value</option>";
                            }
                          }
                          ?>
                        </select>
                        <label for="floatingInput">Label User</label>
                        <div class="invalid-feedback">
                          Pilih Level User
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxx" name="nohp"
                          value="<?php echo $row['nohp'] ?>">
                        <label for="floatingInput">Nomor Handphone</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-floating">
                    <textarea class="form-control" name="alamat" id=""
                      style="height:100px"><?php echo $row['alamat'] ?></textarea>
                    <label for="floatingInput">Alamat</label>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="input_user_validate" value="123456">Save
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
                <form action="proses/proses_delete_user.php" method="POST" class="needs-validation" novalidate>
                  <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                  <div class="col-lg-12">
                    <?php

                    if ($row['username'] == $_SESSION['username_kebabtnt']) {
                      echo "<div class='alert alert-danger'>Anda tidak dapat mengapus akun sendiri </div>";
                    } else {

                      echo "Apakah anda yakin ingin menghapus user <b> $row[username] </b>";
                    }

                    ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="input_user_validate" value="123456" <?php echo ($row['username'] == $_SESSION['username_kebabtnt']) ? 'disabled' : '' ?>>Hapus</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- AKHIR MODAL DELETE-->
      
        <!-- MODAL RESET PASSWORD-->
        <div class="modal fade" id="modalResetPassword<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-md modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">RESET PASSWORD</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="proses/proses_reset_password.php" method="POST" class="needs-validation" novalidate>
                  <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                  <div class="col-lg-12">
                    <?php

                    if ($row['username'] == $_SESSION['username_kebabtnt']) {
                      echo "<div class='alert alert-danger'>Anda tidak dapat mereset password sendiri </div>";
                    } else {
                      echo "Apakah anda yakin ingin mereset password user <b>$row[username]</b> menjadi password bawaan sistem yaitu <b>password</b>";
                    }

                    ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="input_user_validate" value="123456" <?php echo ($row['username'] == $_SESSION['username_kebabtnt']) ? 'disabled' : '' ?>>Reset Password</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- AKHIR MODAL RESET PASSWORD-->

        <?php
      }
      if (empty($result)) {
        echo "Data user tidak ada";
      } else {
        ?>
        <div class="table-responsive text-light mt-3">
          <table class="table table-dark table-hover" id="example">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Level</th>
                <th scope="col">No.HP</th>
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
                    <?php echo $row['nama'] ?>
                  </td>
                  <td>
                    <?php echo $row['username'] ?>
                  </td>
                  <td>
                    <?php if ($row['level'] == 1) {
                      echo "Admin";
                    } else if ($row['level'] == 2) {
                      echo "Penjual";
                    } else if ($row['level'] == 3) {
                      echo "Pelanggan";
                    }  ?>
                  </td>
                  <td>
                    <?php echo $row['nohp'] ?>
                  </td>
                  <td class="d-flex ">
                    <!-- VIEW -->
                    <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                      data-bs-target="#modalView<?php echo $row['id'] ?>"><i class="bi bi-eye-fill"></i></button>
                    <!-- UPDATE -->
                    <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                      data-bs-target="#modalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                    <!-- DELETE -->
                    <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                      data-bs-target="#modalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash3-fill"></i></button>
                    <!-- CHANGE PASSWORD -->
                      <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#modalResetPassword<?php echo $row['id'] ?>"><i class="bi bi-pen-fill"></i></button>
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