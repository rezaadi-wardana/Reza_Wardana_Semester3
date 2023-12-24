<!-- Header -->
<?php include "../header.php"?>

<?php 
if (isset($_POST['create'])) {
    // $icon = $_FILES['icon'];
    $judul = $_POST['judul'];
    $link = $_POST['link'];
    $icon = $_FILES['icon']['name'];
    $tmp = $_FILES['icon']['tmp_name'];

        // Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$icon;
// Set path folder tempat menyimpan fotonya
$path = "images/".$fotobaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){
    //SQL query to insert user data into the users table
    $query = "INSERT INTO survei(icon,judul, link) VALUES('{$fotobaru}','{$judul}','{$link}')";
    $add_judul = mysqli_query($conn, $query);

    //dispaying proper message for the user to see wheter the query excuted perfectly or not
    if (!$add_judul) {
        echo "something went wrong ". mysqli_error($conn);
        
    }else{
        echo "<script type='text/javascript'> alert('Menambahkan Data Berhasil!')</script>";
    }
  

}
}

?>

<h1 class="text-center">Add Survei details</h1>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="icon" class="for-label">Icon</label>
            <input type="file" name="icon" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="judul" class="for-label">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="link" class="form-label">Link</label>
            <input type="text" name="link" class="form-control" required>
        </div>

     

        <div class="form-group">
        <input type="submit" name="create" class="btn 
        btn-primary mt-2" value="Submit">
        </div>

    </form>
</div>


<!-- a BACK button to go to the home page -->
<div class="container text-center mt-5">
<a href="home.php" class="btn btn-warning mt-5"> Back 
</a>
<div>

<!-- Footer -->
<?php include "../footer.php" ?>

 <?php 
// if(!$icon){
//     return false ; 
// }

// function upload(){
//     $namafile = $_FILES['icon']['name'];
//     $ukuranfile = $_FILES['icon']['size'];
//     $error = $_FILES['icon']['error'];
//     $tmpName = $_FILES['icon']['tmp_name'];
//     if ($error === 4){
//         echo "<script>
//         alert('pilih gambar dulu!
//         </script>";
//         return false;
//     }
// }

// $extensiGambarValid = ['jpq','png','jpeg'];
// $extensiGambar = explode('.', $namafile);
// $extensiGambar = strtolower(end( $extensiGambar));
// if (in_array($extensiGambar,$extensiGambarValid)){
//     echo "<script>
//     alert('yang anda upload bukan gambar!')
//     </script>";
//     return false;

// }

///lolos
// move_uploaded_file($tmpName, 'images');


// 

?>
