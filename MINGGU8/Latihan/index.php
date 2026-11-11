<?php
session_start();
include "koneksi.php";

// Logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

// Pengecekan session, kalo ga ketemu berarti masuk ke halaman Login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Ambil password user dari database
$stmt = mysqli_prepare($koneksi, "SELECT password FROM user WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $_SESSION['id']);
mysqli_stmt_execute($stmt);
$hasil = mysqli_stmt_get_result($stmt);
$data  = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Index</title>
    </head>
    <body>
        <div style="border: 1px solid black; padding: 0 8px 8px 8px;">
            <h1>Hallo <?php echo htmlspecialchars($_SESSION['username']); ?> &#128075;,</h1>
            <h3>Selamat Datang Di Halaman Latihan Belajar Session dan User Authenthication!</h3>
            <p>Password anda adalah : <?php echo htmlspecialchars($data['password']); ?></p>
            <a href="index.php?logout=1">Logout</a>
        </div>
    </body>
</html>