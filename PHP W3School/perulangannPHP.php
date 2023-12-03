<!DOCTYPE html>
<html>
    <head>
        <title>Perulangan</title>
    </head>
    <body>
     <?php

    //perulangan while
     $ulangi = 0;
     
     while($ulangi < 10){
         echo "<p>Ini adalah perulangan ke-$ulangi</p>";
         $ulangi++;
     }
    
     //do while
     $ulangi = 10;

        do {
            echo "<p>ini adalah perulangan ke-$ulangi</p>";
            $ulangi--;
        } while ($ulangi > 0);

    //  for
    for($i = 0; $i < 10; $i++){
        echo "<h2>Ini perulangan ke-$i</h2>";
    }
    
     ?>
    </body>
</html>