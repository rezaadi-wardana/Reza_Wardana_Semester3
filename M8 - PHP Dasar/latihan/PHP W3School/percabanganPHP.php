<!DOCTYPE html>
<html>
    <head>
        <title>Percabangan</title>
    </head>
    <body>
        <?php
                    
            $umur = 19;

            //IFELSE
            if ($umur < 18 ){
                echo "Kamu tidak boleh membuka situs ini!";
            } else {
                echo "Selamat datang di website kami!";
            }

            //SWICTH CASE
                        
            $level = 3;

            switch($level){
                case 1:
                    echo "Pelajari HTML";
                    break;
                case 2:
                    echo "Pelajari CSS";
                    break;
                case 3:
                    echo "Pelajari Javascript";
                    break;
                case 4:
                    echo "Pelajari PHP";
                    break;
                default:
                    echo "Kamu bukan programmer!";
            }

            //TERNARY
            $suka = true;
            echo $suka ? "Aku juga suka kamu": "Baiklah!";
            
        ?>
    </body>
</html>