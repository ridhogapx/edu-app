<?php
$host = 'localhost';
$user = 'root';
$pw = '';
$db = 'edu_app';

$koneksi = new mysqli($host,$user,$pw,$db);

if($koneksi->connect_errno) {
    echo "Gagal terhubung ke database" . $koneksi->connect_error;
}



?>