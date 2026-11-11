<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$pesan = "";

if (isset($_POST['register'])) {
    $username   = trim($_POST['username']);
    $password   = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    if ($username === "" || $password === "") {
        $pesan = "Username dan password tidak boleh kosong!";
    } elseif ($password !== $konfirmasi) {
        $pesan = "Konfirmasi password tidak sama!";
    } else {
        $cek = mysqli_prepare($koneksi, "SELECT id FROM user WHERE username = ?");
        mysqli_stmt_bind_param($cek, "s", $username);
        mysqli_stmt_execute($cek);
        mysqli_stmt_store_result($cek);

        if (mysqli_stmt_num_rows($cek) > 0) {
            $pesan = "Username sudah digunakan, silakan isi username lain beserta passwordnya!";
        } else {
            // Username belum ada, simpan ke database
            $simpan = mysqli_prepare($koneksi, "INSERT INTO user (username, password) VALUES (?, ?)");
            mysqli_stmt_bind_param($simpan, "ss", $username, $password);
            mysqli_stmt_execute($simpan);
            header("Location: login.php?status=berhasil");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registrasi</title>
    </head>
    <body>
        <div style="border: 1px solid black; display: inline-block; padding: 0 8px 8px 8px;">
            <h1>Halaman Registrasi Akun Mahasiswa</h1>
            <?php
            if ($pesan != "") {
                echo "<p style='color:red'>" . htmlspecialchars($pesan) . "</p>";
            }
            ?>
            <form method="POST" action="register.php">
                <ul>
                    <li>Username<br><input type="text" name="username"></li>
                    <li>Password<br><input type="password" name="password"></li>
                    <li>Konfirmasi Password<br><input type="password" name="konfirmasi"></li>
                    <li><input type="submit" name="register" value="Register!"></li>
                </ul>
            </form>
            <a href="login.php">Sudah memiliki akun?</a>
        </div>
    </body>
</html>