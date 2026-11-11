<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Percobaan 1</title>
    </head>
    <body>
        <h1>Hasil Kiriman Session pada Halaman 1</h1>
        <?php
        echo "<h2>Username session di Halaman 2: </h2>";
        echo $_SESSION['username'];
        echo "<br><br>";
        ?>
        <a href="halaman1.php">Ke Halaman 1</a>
    </body>
</html>