<?php
// barang/update.php -> UPDATE: mengubah data barang
include("../koneksi.php");

// BAGIAN 1: simpan perubahan saat tombol "Update" ditekan
if (isset($_POST['update'])) {
    $id    = intval($_POST['id']);
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $harga = intval($_POST['harga']);

    mysqli_query($koneksi, "UPDATE barang SET nama='$nama', harga=$harga WHERE id=$id");

    header("Location: index.php");
    exit;
}

// BAGIAN 2: ambil data lama berdasarkan id di URL (update.php?id=...)
$id = intval($_GET['id']);
$result = mysqli_query($koneksi, "SELECT * FROM barang WHERE id=$id");
$barang = mysqli_fetch_array($result);

// Jika id tidak ada di database, kembali ke daftar
if (!$barang) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head><title>Edit Barang</title></head>
<body>
    <h1>Edit Barang</h1>
    <a href="index.php">Batal</a>
    <br><br>

    <form method="post" action="update.php">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" maxlength="100" required
                           value="<?php echo htmlspecialchars($barang['nama']); ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga" min="0" required
                           value="<?php echo $barang['harga']; ?>"></td>
            </tr>
            <tr>
                <!-- hidden: membawa id ke proses update tanpa terlihat oleh pengguna -->
                <td><input type="hidden" name="id" value="<?php echo $barang['id']; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>