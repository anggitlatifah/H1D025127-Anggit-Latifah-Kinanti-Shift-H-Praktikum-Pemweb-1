<?php
session_start();
include('koneksi.php');
$id=$_GET['id'];
$stmt=mysqli_query($koneksi,"delete from pengguna where id=$id");
header("Location:index.php");
?>