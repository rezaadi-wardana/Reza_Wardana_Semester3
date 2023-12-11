
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olah Nama Dosen</title>
     <!-- Bottstap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">    

        <!-- Bootsrap ICON -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
    </style>
</head>
<body>
    <h1 class="text-center">Olah Nama Dosen</h1>
    <br>

    <form method="post" action="" class="d-grid">
        <label for="nama">Masukkan Nama Dosen:</label>
        <input type="text" name="nama" id="nama" placeholder="Contoh: John Doe">
        <button type="submit" name="proses" col-md-2>Proses Nama</button>
    </form>
        <br>


    <?php
    if (isset($_POST['proses'])) {
        $namaDosen = $_POST['nama']; // Mengambil nilai input

        // Menghitung jumlah kata
        $jumlahKata = str_word_count($namaDosen);

        // Menghitung jumlah huruf
        $jumlahHuruf = strlen(str_replace(' ', '', $namaDosen));

        // Menghitung kebalikan nama
        $kebalikanNama = strrev($namaDosen);
    ?>
    <div class="container text-start bg-warning padding-2">
        <h2 >Hasil:</h2>
        <p>Jumlah Kata: <?php echo $jumlahKata; ?></p>
        <p>Jumlah Huruf: <?php echo $jumlahHuruf; ?></p>
        <p>Kebalikan Nama: <?php echo $kebalikanNama; ?></p>
        </div>
    <?php
    }
    ?>

</body>
</html>
