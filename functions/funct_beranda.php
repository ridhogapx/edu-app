<?php


function post_beranda() {
    global $koneksi;
    $id = 1;
    $query = $koneksi->prepare("SELECT post FROM beranda_post WHERE id=?");
    $query->bind_param('i', $id);
    $query->execute();

    $query->bind_result($get_data);
    while($query->fetch()) {
        echo $get_data;
    }
    
}

function update_post_beranda($post) {
    global $koneksi;
    $post= $koneksi->real_escape_string($post);
    $query = "UPDATE beranda_post SET post='$post' WHERE id=1";
    
    if($koneksi->query($query) === TRUE) {
        return true;
    } else {
        return false;
    }
    

    
}

function waktu() {
     date_default_timezone_set("Asia/Jakarta");
    $jam = date("H");
    if(00 <= $jam && $jam <= 03) {
        echo "Jangan lupa istirahat kak, ";
    }elseif(04<= $jam && $jam<= 10) {
        echo "Selamat pagi, ";
    }elseif(11<= $jam && $jam<=14) {
        echo "Selamat siang, ";
    }elseif(15<= $jam && $jam<=18) {
        echo "Selamat sore, ";
    }elseif(19<=$jam && $jam<=23) {
        echo "Selamat malam, ";
    }
}



?>