<?php
require __DIR__ . '/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judul'] ?? '');
    $konten = trim($_POST['konten'] ?? '');

    if ($judul === '' || $konten === '') {
        die('Judul dan konten wajib diisi.');
    }

    if (strlen($judul) > 100 || strlen($konten) > 1000) {
        die('Judul maksimal 100 karakter dan konten maksimal 1000 karakter.');
    }

    $query = $koneksi->prepare('INSERT INTO posts (judul, konten) VALUES (?, ?)');
    $query->bind_param('ss', $judul, $konten);
    $query->execute();

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Post Berita</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="form-page">
        <section class="form-panel">
            <h1>Tambah Post Berita!</h1>
            <p><a href="index.php">Batal</a></p>
            <form method="post" action="tambah.php">
                <div class="form-row">
                    <label for="judul">Judul</label>
                    <input id="judul" name="judul" type="text" maxlength="100" required>
                </div>
                <div class="form-row">
                    <label for="konten">Konten</label>
                    <textarea id="konten" name="konten" maxlength="1000" rows="8" required></textarea>
                </div>
                <button type="submit">Tambah</button>
            </form>
        </section>
    </main>
</body>
</html>
