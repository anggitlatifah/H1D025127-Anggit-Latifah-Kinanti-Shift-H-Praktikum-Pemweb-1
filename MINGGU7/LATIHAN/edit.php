<?php
require __DIR__ . '/koneksi.php';

$id = (int) ($_GET['id'] ?? $_POST['id'] ?? 0);
$query = $koneksi->prepare('SELECT id, judul, konten FROM posts WHERE id = ?');
$query->bind_param('i', $id);
$query->execute();
$post = $query->get_result()->fetch_assoc();

if (!$post) {
    http_response_code(404);
    die('Post tidak ditemukan.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judul'] ?? '');
    $konten = trim($_POST['konten'] ?? '');

    if ($judul === '' || $konten === '') {
        die('Judul dan konten wajib diisi.');
    }

    if (strlen($judul) > 100 || strlen($konten) > 1000) {
        die('Judul maksimal 100 karakter dan konten maksimal 1000 karakter.');
    }

    $update = $koneksi->prepare('UPDATE posts SET judul = ?, konten = ? WHERE id = ?');
    $update->bind_param('ssi', $judul, $konten, $id);
    $update->execute();

    header('Location: index.php');
    exit;
}

function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Post Berita</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="form-page">
        <section class="form-panel">
            <h1>Edit Post Berita!</h1>
            <p><a href="index.php">Batal</a></p>
            <form method="post" action="edit.php">
                <input type="hidden" name="id" value="<?= (int) $post['id'] ?>">
                <div class="form-row">
                    <label for="judul">Judul</label>
                    <input id="judul" name="judul" type="text" maxlength="100" value="<?= e($post['judul']) ?>" required>
                </div>
                <div class="form-row">
                    <label for="konten">Konten</label>
                    <textarea id="konten" name="konten" maxlength="1000" rows="8" required><?= e($post['konten']) ?></textarea>
                </div>
                <button type="submit">Update</button>
            </form>
        </section>
    </main>
</body>
</html>