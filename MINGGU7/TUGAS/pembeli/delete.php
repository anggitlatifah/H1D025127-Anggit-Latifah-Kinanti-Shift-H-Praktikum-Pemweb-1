<?php
// pembeli/delete.php -> DELETE: menghapus data pembeli berdasarkan id (sama seperti barang/delete.php)
include("../koneksi.php");
$id = intval($_GET['id']);
mysqli_query($koneksi, "DELETE FROM pembeli WHERE id=$id");
header("Location: index.php");
exit;
?>