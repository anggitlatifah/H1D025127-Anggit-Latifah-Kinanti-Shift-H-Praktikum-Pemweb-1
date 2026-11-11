<?php
// kurir/index.php -> READ: menampilkan seluruh data kurir
// (alurnya sama persis dengan barang/index.php)
include("../koneksi.php");
$read = mysqli_query($koneksi, "SELECT * FROM kurir ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head><title>Data Kurir</title></head>
<body>
    <h1>Data Kurir</h1>
    <a href="../index.php">Kembali ke Index</a> |
    <a href="create.php"><button>Tambah Kurir</button></a>
    <br><br>
    <table border="1" cellpadding="4">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Nomor HP</th>
            <th>Operasi</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($read)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nomor_hp']) . "</td>";
            echo "<td><a href='update.php?id=" . $row['id'] . "'>Edit</a> | "
               . "<a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Yakin hapus?')\">Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>