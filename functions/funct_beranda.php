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



?>