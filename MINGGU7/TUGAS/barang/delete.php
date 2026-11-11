<?php
// barang/delete.php -> DELETE: menghapus barang berdasarkan id
include("../koneksi.php");

$id = intval($_GET['id']);   // id dari URL, dipaksa jadi angka

// DELETE FROM ... WHERE id : hapus satu baris saja (WHERE wajib ada!)
mysqli_query($koneksi, "DELETE FROM barang WHERE id=$id");

header("Location: index.php");
exit;
?>