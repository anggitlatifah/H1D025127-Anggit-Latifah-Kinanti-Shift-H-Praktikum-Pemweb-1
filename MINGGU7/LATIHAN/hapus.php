<?php
require __DIR__ . '/koneksi.php';

$id = (int)($_GET['id'] ?? 0);
if ($id > 0) {
    $query = $koneksi->prepare('DELETE FROM posts WHERE id = ?');
    $query->bind_param('i', $id);
    $query->execute();
}
header('Location: index.php');
exit;
?>