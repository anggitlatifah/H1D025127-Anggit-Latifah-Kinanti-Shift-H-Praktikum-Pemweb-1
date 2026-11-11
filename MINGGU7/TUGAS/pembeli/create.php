<?php
// pembeli/create.php -> CREATE: menambah data pembeli (sama seperti barang/create.php)
include("../koneksi.php");

if (isset($_POST['Submit'])) {
    // ambil input form + bersihkan untuk SQL
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nomor_hp = mysqli_real_escape_string($koneksi, $_POST['nomor_hp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    // simpan ke database
    mysqli_query($koneksi, "INSERT INTO pembeli(nama, nomor_hp, alamat) VALUES('$nama', '$nomor_hp', '$alamat')");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head><title>Tambah Pembeli</title></head>
<body>
    <h1>Tambah Pembeli</h1>
    <a href="index.php">Batal</a>
    <br><br>
    <form action="create.php" method="POST">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" maxlength="100" required></td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td><input type="text" name="nomor_hp" pattern="[0-9]{8,15}" title="Hanya angka, 8-15 digit" maxlength="15" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" maxlength="255" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>
</html>