<?php
function register_user($nama,$pw,$nama_lengkap,$nama_panggilan) {
    global $koneksi;
    $nama  = $koneksi->real_escape_string($nama);
    $pw = $koneksi->real_escape_string($pw);
    $nama_lengkap = $koneksi->real_escape_string($nama_lengkap);
    $nama_panggilan = $koneksi->real_escape_string($nama_panggilan);
    $pw = password_hash($pw,PASSWORD_DEFAULT);
    $query = "INSERT INTO daftar_user (username, password, nama_lengkap, nama_panggilan) VALUES ('$nama', '$pw', '$nama_lengkap', '$nama_panggilan')";
    
    if($koneksi->query($query) === TRUE) {
        return true;
    } else {
        return false;
    }

}

function register_cek_nama($nama) {
    global $koneksi;
    $nama  = $koneksi->real_escape_string($nama);
    $query = "SELECT username FROM daftar_user WHERE username='$nama' ";
    if($result = $koneksi->query($query)) {
        if(mysqli_num_rows($result) == 0) {
            return true;
        } else {
            return false;
        }
    }


}

function cek_data($nama,$pw) {
    global $koneksi;
    $nama  = $koneksi->real_escape_string($nama);
    $pw = $koneksi->real_escape_string($pw);
    $query = $koneksi->prepare("SELECT password FROM daftar_user WHERE username=?");
    $query->bind_param('s',$nama);
    $query->execute();
    $query->bind_result($get_pw);
    $query->fetch();

    
    if(password_verify($pw,$get_pw)) { 
        return true;
    } else {
        return false;
    }
}

function login_cek_nama($nama) {
    global $koneksi;
    $nama  = $koneksi->real_escape_string($nama);
    $query = "SELECT username FROM daftar_user WHERE username='$nama' ";
    if($result = $koneksi->query($query)) {
        if(mysqli_num_rows($result) != 0) {
            return true;
        } else {
            return false;
        }
    }
}

function cek_tingkat($nama) {
    global $koneksi;
    $query = $koneksi->prepare("SELECT tingkat FROM daftar_user WHERE username=?");
    $query->bind_param('s', $nama);
    $query->execute();
    
    $query->bind_result($role);
    while($query->fetch()) {
        return $role;
    }
    
    
}

function cek_role() {
    global $koneksi;
    $query = "SELECT * FROM daftar_user WHERE tingkat=1 ";
    $result = $koneksi->query($query);
    return $result;
}

function get_info_per_user($id) {
    global $koneksi;
    $query = "SELECT * FROM daftar_user WHERE id=$id ";
    $result = $koneksi->query($query);
    return $result;
}

function nama_panggilan($nama) {
    global $koneksi;
    $query = $koneksi->prepare("SELECT nama_panggilan FROM daftar_user WHERE username=? ");
    $query->bind_param('s',$nama);
    $query->execute();

    $query->bind_result($nama_panggilan);
    while($query->fetch()) {
        echo $nama_panggilan;
    }
}

?>