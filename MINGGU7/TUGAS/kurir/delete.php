<?php
// kurir/delete.php -> DELETE: menghapus data kurir berdasarkan id (sama seperti barang/delete.php)
include("../koneksi.php");
$id = intval($_GET['id']);
mysqli_query($koneksi, "DELETE FROM kurir WHERE id=$id");
header("Location: index.php");
exit;
?>