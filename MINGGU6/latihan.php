<?php
$mahasiswa = [
    ["nama" => "Romi",  "asal" => "Bogor",  "umur" => 22],
    ["nama" => "Anto",  "asal" => "Depok",  "umur" => 23],
    ["nama" => "Putri", "asal" => "Bangka", "umur" => 21],
];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Latihan Array Multidimensi</title>
    </head>
    <body>
        <?php foreach ($mahasiswa as $data): ?>
        <?= htmlspecialchars($data["nama"]) ?><br>
        Asal: <?= htmlspecialchars($data["asal"]) ?><br>
        Umur: <?= htmlspecialchars($data["umur"]) ?><br><br>
    <?php endforeach; ?>
    </body>
</html>