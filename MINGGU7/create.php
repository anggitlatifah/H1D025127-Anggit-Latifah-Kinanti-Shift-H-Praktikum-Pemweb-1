<?php
if(isset($_POST['Submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    include("koneksi.php");

    $result = mysqli_query($koneksi, "INSERT INTO pengguna(username, password) VALUES('$username','$password')");
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Create/Add</title>
    </head>
    <body>
        <h1>Memasukan Data pada Database!</h1>
        <form action="create.php" method="POST">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="username" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>