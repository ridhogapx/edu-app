<?php
$host = 'localhost';
$user = 'root';
$pw = '';
$db = 'edu_app';

$koneksi = mysqli_connect($host,$user,$pw,$db);

if(!$koneksi) {
    die("Gagal menghubungkan database!" . mysqli_connect_error());
}

?>