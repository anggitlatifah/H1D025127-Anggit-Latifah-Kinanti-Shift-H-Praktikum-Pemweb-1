<?php
// barang/index.php -> READ: menampilkan seluruh data barang

include("../koneksi.php");

// Ambil semua barang, urut dari id terkecil
$read = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head><title>Data Barang</title></head>
<body>
    <h1>Data Barang</h1>
    <a href="../index.php">Kembali ke Index</a> |
    <a href="create.php"><button>Tambah Barang</button></a>
    <br><br>

    <table border="1" cellpadding="4">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Operasi</th>
        </tr>
        <?php
        // Loop: satu putaran = satu baris data barang
        while ($barang = mysqli_fetch_array($read)) {
            echo "<tr>";
            echo "<td>" . $barang['id'] . "</td>";
            echo "<td>" . htmlspecialchars($barang['nama']) . "</td>";
            // number_format(angka, 0, ',', '.') : format ribuan Indonesia, contoh 7500000 -> 7.500.000
            echo "<td>Rp " . number_format($barang['harga'], 0, ',', '.') . "</td>";
            // Link Edit/Delete membawa id barang lewat URL (?id=...)
            echo "<td><a href='update.php?id=" . $barang['id'] . "'>Edit</a> | "
               . "<a href='delete.php?id=" . $barang['id'] . "' onclick=\"return confirm('Yakin hapus?')\">Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>