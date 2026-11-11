<?php
include("koneksi.php");
$read = mysqli_query($koneksi,
    "SELECT b.id,
            b.nama AS nama_barang,
            p.nama AS nama_pembeli,
            k.nama AS nama_kurir
     FROM barang b
     JOIN pembeli p ON b.id = p.id
     JOIN kurir   k ON b.id = k.id
     ORDER BY b.id ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Pendataan COD Barang</title>
</head>
<body>
    <h1>Menampilkan data dari database</h1>
    <a href="barang/index.php"><button>Kelola Barang</button></a>
    <a href="pembeli/index.php"><button>Kelola Pembeli</button></a>
    <a href="kurir/index.php"><button>Kelola Kurir</button></a>
    <br><br>
    <table border="1" cellpadding="4">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Nama Pembeli</th>
            <th>Nama Kurir</th>
        </tr>
        <?php
        while ($data = mysqli_fetch_array($read)) {
            echo "<tr>";
            echo "<td>" . $data['id'] . "</td>";
            echo "<td>" . htmlspecialchars($data['nama_barang'])  . "</td>";
            echo "<td>" . htmlspecialchars($data['nama_pembeli']) . "</td>";
            echo "<td>" . htmlspecialchars($data['nama_kurir'])   . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>