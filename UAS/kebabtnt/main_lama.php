<?php
// session_start();
if (empty($_SESSION['username_kebabtnt'])) {
  header('location:login');
}

include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$_SESSION[username_kebabtnt]'");
$hasil = mysqli_fetch_array($query);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kebab Burger TNT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
</head>

<body class="sub-page">

  <!-- HEADER -->
  <?php include "header.php" ?>
  <!-- END HEADER -->
  <div class="container-lg">

    <div class="row mb-5">

      <!-- sidebar -->
      <?php include "sidebar.php" ?>
      <!-- end sidebar -->

      <!-- CONTENT -->
      <?php
      include $page;
      
      ?>
      <!-- END CONTECT -->

    </div>

    <div class="fixed-bottom text-light py-2 bg-dark text-center ">
      Copyright 2024 Reza Wardana
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>
  <script>
  $(document).ready( function () {
    $('#example').DataTable();
} );
</script>
</body>

</html>