<?php
// barang/create.php -> CREATE: menambah barang baru
include("../koneksi.php");

// Hanya jalan setelah tombol "Submit" ditekan
if (isset($_POST['Submit'])) {
    // Ambil data dari form & bersihkan agar aman masuk ke query SQL
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $harga = intval($_POST['harga']);   // intval: pastikan harga berupa angka bulat

    // INSERT INTO: simpan data baru ke tabel barang (id terisi otomatis)
    mysqli_query($koneksi, "INSERT INTO barang(nama, harga) VALUES('$nama', $harga)");

    // Kembali ke daftar barang, lalu exit agar skrip berhenti
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head><title>Tambah Barang</title></head>
<body>
    <h1>Tambah Barang</h1>
    <a href="index.php">Batal</a>
    <br><br>

    <form action="create.php" method="POST">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" maxlength="100" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga" min="0" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>
</html>