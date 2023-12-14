<!DOCTYPE html>
<head>
    <title>PHP</title> 
</head>
<body>
        <?php
    $txt = "PHP";
    echo "I Love $txt";

    // ECHO "Hello world";
    echo "Hello world";
    EcHo "Hello world";


     print "<br>ini menggunakan print";
    // print "ini menggunakan print","ini menggunakan print","ini menggunakan print";
    echo  "<br>ini menggunakan Echo";
    echo  "<br>ini menggunakan Echo","ini menggunakan Echo","ini menggunakan Echo";
    ?>
    <br>
    

    <?php
    $color = "red";
    echo "Topiku berwarna", $color,"<br>";
    echo "tasku berwarna", $color,"<br>";
    echo "bajuku berwarna", $color,"<br>";
    
    // VARIABEL
    $x = 10;
    $y = 27;
    echo $x + $y;
     ?>

     <?php 
    //  GLOBAL SCOPE
    $xx = 5;
    function myTest(){
        // echo"<p>Variable x inside function is: $xx </p>";
    }
    myTest();
    echo"<p>Variable x inside function is: $xx </p>";
     ?>

    <?php
    $txt1 = "Tutor PHP";
    $txt2 = "polibang";
    $x = 5;
    $y = 4;
    
    echo "<h2>" . $txt1 . "</h2>";
    echo "<br>belajar pemrograman PHP di " . $txt2 . "<br>";
    echo $x + $y;

    $harga = 1050000;
    echo "<br>Harganya adalah Rp $harga";

    printf("<br>Harganya adalah Rp %.2f", $harga);
    ?>
    
   
    <!-- TIPE DATA PHP -->
    <?php
// char
    $jenis_kelamin = 'L';
// String
    $nama_lengkap = "Reza Wardana";
//   Int
    $umur = 18;
// Float
    $berat = 44.38;
// float
    $tinggi = 9878.62;
// bpplean
    $menikah = false;
    
    echo "Nama: $nama_lengkap<br>";
    echo "Jenis Kelamin: $jenis_kelamin<br>";
    echo "Umur: $umur tahun<br>";
    echo "berat badan: $berat kg<br>";
    echo "tinggi badan: $tinggi cm<br>";
    echo "menikah: $menikah";
    ?>

    <!-- ARRAY PHP -->
    <?php
    $kota = ["Jepara", "Kudus", "Demak"];
    ?>

    <!-- MENGHAPUS VARIABEL DARI MEMORI -->
    <?php
    // membuat variabel 
    $temp = 2901;

    // menghapus variabel 
    unset($temp);

    // mencoba mengakses variabel 
    // echo $temp;
    ?>
    
    <?php
    $a = 5;
    $b = 2;


    // OPREATOR
    //Operator penjumlahan
    $c = $a + $b;
    echo "$a + $b = $c";
    echo "<hr>";
    
    //Operator pengurangan
    $c = $a - $b;
    echo "$a - $b = $c";
    echo "<hr>";
    
    // Operator Perkalian
    $c = $a * $b;
    echo "$a * $b = $c";
    echo "<hr>";
    
    //Operator Pembagian
    $c = $a / $b;
    echo "$a / $b = $c";
    echo "<hr>";
    
    //Operator Sisa bagi
    $c = $a % $b;
    echo "$a % $b = $c";
    echo "<hr>";
    
    //Operator Pangkat
    $c = $a ** $b;
    echo "$a ** $b = $c";
    echo "<hr>";
    
    // Operrtor penugasan
    $speed = 83;
    $speed = $speed + 10;
    $speed += 10;

// Increment decrement
$score = 0;

$score++;
$score++;
$score++;

echo $score;

 //OPERATOR RELASI 


 $a = 6;
 $b = 2;
 
 //operator relasi lebih besar
 $c = $a > $b;
 echo "$a > $b: $c";
 echo "<hr>";
 
 //operator relasi lebih kecil
 $c = $a < $b;
 echo "$a < $b: $c";
 echo "<hr>";
 
 //operator relasi lebih sama dengan
 $c = $a == $b;
 echo "$a == $b: $c";
 echo "<hr>";
 
 //operator relasi lebih tidak sama dengan
 $c = $a != $b;
 echo "$a != $b: $c";
 echo "<hr>";
 
 //operator relasi lebih besar sama dengan
 $c = $a >= $b;
 echo "$a >= $b: $c";
 echo "<hr>";
 
 //operator relasi lebih kecil sama dengan
 $c = $a <= $b;
 echo "$a <= $b: $c";
 echo "<hr>";

 //OPERATOR LOGIKA
 $a = true;
$b = false;

// variabel $c akan bernilai false
$c = $a && $b;
printf("%b && %b = %b", $a,$b,$c);
echo "<hr>";

// variabel $c akan bernilai true
$c = $a || $b;
printf("%b || %b = %b", $a,$b,$c);
echo "<hr>";

// variabel $c akan bernilai false
$c = !$a;
printf("!%b = %b", $a, $c);
echo "<hr>";


//OPERATOR BIT WIS
$a = 60;
$b = 13;

// bitwise AND
$c = $a & $b;
echo "$a & $b = $c";
echo "<br>";

// bitwise OR
$c = $a | $b;
echo "$a | $b = $c";
echo "<br>";

// bitwise XOR
$c = $a ^ $b;
echo "$a ^ $b = $c";
echo "<br>";

// Shift Left
$c = $a << $b;
echo "$a << $b = $c";
echo "<br>";

// Shift Right
$c = $a >> $b;
echo "$a >> $b = $c";
echo "<br>";

//OPERATOR TERNARY
$suka = true;
$jawab = $suka ? "iya": "tidak";
echo $jawab;
?>

</body>











































































































































































































































































































































































































































































































































    

</body>
