<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator</title>
</head>
<body>
    <?php
// OPREATOR
echo "<h1> OPERATOR ARIMATIKA</h1>";

    $a = 5;
    $b = 2;
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
echo "<h1> OPERATOR PERBANDINGAN</h1>";
 
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
 echo "<h1> OPERATOR PENUGASAN</h1>";

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
</html>