<!DOCTYPE html>
<html>
    <head>
        <title>Percobaan 4 - Functions & Statements</title>
    </head>
    <body>
        <?php
        function text(){
            echo "Helo world! <br><br>";
        }
        text();

        function olahraga($sport){
            echo "Saya bermain $sport <br>";
        }
        
        olahraga("sepak bola");
        olahraga("basket");
        olahraga("voli");
        olahraga("badminton");
        olahraga("golf <br>");

        function penjumlahan(int $a, int $b){
            return $a + $b;
        }
        echo penjumlahan(5, 2) . "<br>";

        function tambah_dua(&$value){
            $value += 2;
        }
        $num = 4;
        tambah_dua($num);
        echo $num . "<br><br>";

        function lahir(&$bulanKelahiran){
            switch($bulanKelahiran){
                case "Januari":
                    echo "Anda lahir di bulan Januari!";
                    break;
                case "Februari":
                    echo "Anda lahir di bulan Februari!";
                    break;
                case "Maret":
                    echo "Anda lahir di bulan Maret!";
                    break;
                default:
                    echo "Bulan kelahiran Anda bukan Januari, Februari ataupun Maret";
            }
        }
        $bulan = "November";
        echo lahir($bulan);
        ?>
    </body>
</html>