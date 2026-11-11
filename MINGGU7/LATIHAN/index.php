<?php
require __DIR__ . '/koneksi.php';

$posts = $koneksi->query('SELECT id, judul, konten FROM posts ORDER BY id ASC');

function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Post News</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="news-page">
        <h1>Post News</h1>
        <p><a href="tambah.php"><button type="button">Tambah Post</button></a></p>

        <?php if ($posts->num_rows === 0): ?>
            <p>Belum ada post berita.</p>
        <?php endif; ?>

        <?php while ($post = $posts->fetch_assoc()): ?>
            <article class="post">
                <h2><?= e($post['judul']) ?></h2>
                <p class="post-links">
                    <a href="edit.php?id=<?= (int) $post['id'] ?>">Edit</a> |
                    <a href="hapus.php?id=<?= (int) $post['id'] ?>" onclick="return confirm('Yakin ingin menghapus post ini?')">Delete</a>
                </p>
                <div class="post-content"><?= nl2br(e($post['konten'])) ?></div>
            </article>
        <?php endwhile; ?>
    </main>
</body>
</html>