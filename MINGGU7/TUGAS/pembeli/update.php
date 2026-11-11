<?php
// pembeli/update.php -> UPDATE: mengubah data pembeli (sama seperti barang/update.php)
include("../koneksi.php");

// BAGIAN 1: simpan perubahan
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nomor_hp = mysqli_real_escape_string($koneksi, $_POST['nomor_hp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    // UPDATE ... WHERE id : hanya baris dengan id tersebut yang berubah
    mysqli_query($koneksi, "UPDATE pembeli SET nama='$nama', nomor_hp='$nomor_hp', alamat='$alamat' WHERE id=$id");
    header("Location: index.php");
    exit;
}

// BAGIAN 2: ambil data lama untuk mengisi form
$id = intval($_GET['id']);
$result = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE id=$id");
$row = mysqli_fetch_array($result);
if (!$row) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head><title>Edit Pembeli</title></head>
<body>
    <h1>Edit Pembeli</h1>
    <a href="index.php">Batal</a>
    <br><br>
    <form method="post" action="update.php">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" maxlength="100" required
                           value="<?php echo htmlspecialchars($row['nama']); ?>"></td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td><input type="text" name="nomor_hp" pattern="[0-9]{8,15}" title="Hanya angka, 8-15 digit" maxlength="15" required
                           value="<?php echo htmlspecialchars($row['nomor_hp']); ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" maxlength="255" required
                           value="<?php echo htmlspecialchars($row['alamat']); ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $row['id']; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>