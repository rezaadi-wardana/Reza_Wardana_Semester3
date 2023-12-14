<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan4</title>
</head>
<body>
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

    </body>
    </html>