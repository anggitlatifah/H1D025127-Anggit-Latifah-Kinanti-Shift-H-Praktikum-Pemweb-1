<?php
// pembeli/index.php -> READ: menampilkan seluruh data pembeli
// (alurnya sama persis dengan barang/index.php)
include("../koneksi.php");
$read = mysqli_query($koneksi, "SELECT * FROM pembeli ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head><title>Data Pembeli</title></head>
<body>
    <h1>Data Pembeli</h1>
    <a href="../index.php">Kembali ke Index</a> |
    <a href="create.php"><button>Tambah Pembeli</button></a>
    <br><br>
    <table border="1" cellpadding="4">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Nomor HP</th>
            <th>Alamat</th>
            <th>Operasi</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($read)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nomor_hp']) . "</td>";
            echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
            echo "<td><a href='update.php?id=" . $row['id'] . "'>Edit</a> | "
               . "<a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Yakin hapus?')\">Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>