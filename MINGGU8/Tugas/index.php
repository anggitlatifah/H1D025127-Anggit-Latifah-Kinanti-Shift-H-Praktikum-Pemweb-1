<?php
session_start();

// Pengecekan session, kl belum login kembali ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Batas waktu ada di halaman utama: 10 detik
$batas = 10;
$sisa  = $batas - (time() - $_SESSION['login_time']);

// Kl udah lewat 10 detik, keluar otomatis dan kembali ke halaman login
if ($sisa <= 0) {
    header("Location: logout.php?pesan=expired");
    exit;
}

header("Refresh: " . $sisa . "; url=logout.php?pesan=expired");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Index</title>
    </head>
    <body>
        <h1>Hallo <?php echo htmlspecialchars($_SESSION['username']); ?>,</h1>
        <h3>Selamat Datang di Halaman Utama</h3>
        <p>Anda akan otomatis keluar dan kembali ke halaman login dalam <b id="hitung"><?php echo $sisa; ?></b> detik.</p>
        <a href="logout.php">Logout</a>
        <script>
            var detik = <?php echo $sisa; ?>;
            var elemen = document.getElementById("hitung");
            setInterval(function () {
                if (detik > 0) {
                    detik--;
                    elemen.textContent = detik;
                }
            }, 1000);
        </script>
    </body>
</html>