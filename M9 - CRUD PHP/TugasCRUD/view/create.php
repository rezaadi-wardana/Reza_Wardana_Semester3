
<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $link = $_POST['link'];
    $icon = $_FILES['icon']['name'];
    $tmp = $_FILES['icon']['tmp_name'];

           // Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$icon;
// Set path folder tempat menyimpan fotonya
$path = "images/".$fotobaru;
    // Lakukan operasi CREATE ke database (sesuai kebutuhan)
    if(move_uploaded_file($tmp, $path)){
        //SQL query to insert user data into the users table
        $query = "INSERT INTO survei(icon,judul, link) VALUES('{$fotobaru}','{$judul}','{$link}')";
        $add_judul = mysqli_query($conn, $query);

    if ($add_judul) {
        echo "<script type='text/javascript'>   alert('Menambahkan data berhasil');
        window.location.href = 'home.php';</script>";
        
    } else {
        echo "Error: " . $query . "<br>" ;
    }}
}

$conn->close();
?>
