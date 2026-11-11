<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
    $koneksi = new mysqli('localhost','root','','modul_6');
    $koneksi->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e){
    http_response_code(500);
    die(
        'Koneksi/database gagal: ' . htmlspecialchars($e->getMessage()) . '<br>Pastikan MySQL aktif dan database modul_6 suda dibuat dengan menjalankan database.sql di phpMyAdmin.');
}
?>