<?php
session_start();

$users = [
    "admin" => "admin123",
    "andi"  => "andi123",
    "bunga" => "bunga321"
];

$pesan = "";

if (isset($_GET['pesan']) && $_GET['pesan'] == "expired") {
    $pesan = "Waktu 10 detik habis, Anda otomatis keluar. Silakan login kembali.";
} elseif (isset($_GET['pesan']) && $_GET['pesan'] == "logout") {
    $pesan = "Anda berhasil logout.";
}

if (isset($_SESSION['username']) && (time() - $_SESSION['login_time']) < 10) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (isset($users[$username]) && $users[$username] === $password) {
        session_regenerate_id(true);
        $_SESSION['username']   = $username;
        $_SESSION['login_time'] = time(); // waktu mulai login
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
        <h1>Halaman Login</h1>
        <?php
        if ($pesan != "") {
            echo "<p style='color:red'>" . htmlspecialchars($pesan) . "</p>";
        }
        ?>
        <form method="POST" action="login.php">
            <table>
                <tr>
                    <td>Username</td>
                    <td>: <input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>: <input type="password" name="password"></td>
                </tr>
                <tr>
                    <td></td>
                   <td><input type="submit" name="login" value="Login"></td>
                </tr>
            </table>
        </form>
    </body>
</html>