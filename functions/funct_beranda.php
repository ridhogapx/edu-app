<?php


function post_beranda() {
    global $koneksi;
    $query = "SELECT post FROM beranda_post";
    $result = mysqli_query($koneksi,$query);
    $data = mysqli_fetch_assoc($result);
    return $data;
    
}

function update_post_beranda($post) {
    global $koneksi;
    $query = "UPDATE beranda_post SET post='$post'";
    if(mysqli_query($koneksi,$query)) {
        return true;
    } else {
        return false;
    }
}


?>