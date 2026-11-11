<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$pesan = "";

if (isset($_GET['status']) && $_GET['status'] == "berhasil") {
    $pesan = "Registrasi berhasil, silakan login.";
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mencocokan username dan password sm data di database
    $stmt = mysqli_prepare($koneksi, "SELECT id, username FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $hasil = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($hasil) == 1) {
        $data = mysqli_fetch_assoc($hasil);
        session_regenerate_id(true);
        $_SESSION['id']       = $data['id'];
        $_SESSION['username'] = $data['username'];
        header("Location: index.php");
        exit;
    } else {
        $pesan = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
    </head>
    <body>
        <div style="border: 1px solid black; display: inline-block; padding: 0 8px 8px 8px;">
            <h1>Halaman Login User yang Terdaftar!</h1>
            <?php
            if ($pesan != "") {
                echo "<p style='color:red'>" . htmlspecialchars($pesan) . "</p>";
            }
            ?>
            <form method="POST" action="login.php">
                <ul>
                    <li>Username <input type="text" name="username"></li>
                    <li>Password <input type="password" name="password"></li>
                    <li><input type="submit" name="login" value="Login!"></li>
                </ul>
            </form>
            <a href="register.php">Buat akun baru!</a>
        </div>
    </body>
</html>