<?php
$conn = mysqli_connect("localhost","root","","TugasPHP");

$nama = $_POST['nama'];
$email = $_POST['email'];
$website = $_POST['web'];
$coment = $_POST['coment'];
$gender = $_POST['gender'];
$submit = $_POST['submit'];

$query = "INSERT INTO tugasPraktikum2 VALUES('$nama','$email','$website','$coment','$gender','$submit')";

mysqli_query($conn, $query);
?>