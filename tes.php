<?php
require_once 'core/init.php';
$jam= waktu();
if(00 <= $jam && $jam <= 03) {
    echo "Sudah larut malam. Jangan lupa istirahat kak";
}elseif(04<= $jam && $jam<= 10) {
    echo "Selamat pagi";
}elseif(11<= $jam && $jam<=14) {
    echo "Selamat siang";
}elseif(15<= $jam && $jam<=18) {
    echo "Selamat sore";
}elseif(19<=$jam && $jam<=23) {
    echo "Selamat malam";
}
 
?>