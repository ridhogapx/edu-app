<?php

require_once 'core/init.php';

if(isset($_SESSION['user'])) {
  header('Location: index.php');
}

$error = '';
$msg_berhasil = '';

if(isset($_POST['register'])) {
    $nama = $_POST['username'];
    $pw = $_POST['password'];
    $conf_pw = $_POST['conf_password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nama_panggilan = $_POST['nama_panggilan'];
    if(!empty(trim($nama)) && !empty(trim($pw)) && !empty(trim($conf_pw)) && !empty(trim($nama_lengkap)) && !empty(trim($nama_panggilan)) ) {
        if(register_cek_nama($nama)) {
            if($pw == $conf_pw) {
                if(register_user($nama,$pw,$nama_lengkap,$nama_panggilan)) {
                    $msg_berhasil = "Berhasil register!";
                } else {
                    $error = "Gagal register!";
            }
            } else {
                $error = "Konfirmasikan ulang password kamu!";
            }
        } else {
            $error = "Username sudah dipakai oleh pengguna lain!";
        }

    } else {
        $error =  "Tidak boleh kosong!";
    }
}

?>

<?php require_once 'view/header.php'; ?>

<nav class="navbar  navbar-expand-lg bg-primary navbar-dark shadow-sm" id="navbar">
  <div class="container">
    <a class="navbar-brand" href="index.php"><img src="assets/logo_edu2.png" alt="logo" width="150"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto" >
        <li class="nav-item">
          <a class="nav-link  me-3" aria-current="page" href="index.php"><i class="fa-solid fa-house m me-2" ></i>Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lorong_kelas.php"><i class="fa-solid fa-school me-2"></i>Lorong Kelas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-chalkboard me-2"></i>Papan Informasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="login.php"><i class="fa-solid fa-graduation-cap me-2"></i>Akun</a>
        </li>
        
       
        
      </ul>
    </div>
  </div>
</nav>


<section>
    <div class="container">
        <div class="row mt-2">
            <div class="col">
            <?php if($error != '')  { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
                </div>
                <?php } ?>
                    <?php if($msg_berhasil != '') { ?>
                    <div class="alert alert-success" role="alert"> 
                        <?php echo $msg_berhasil; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>


<section class="vh-100 login_register"  >
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST" action="register.php">
         

          

          <!-- Username input -->
          <h2 class="mt-3">Register</h2>
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" name="username" class="form-control form-control-lg"
              placeholder="Buatlah username yang unik ^-^" />
            <label class="form-label" for="form3Example3">Username</label>
          </div>
          <!-- Input nama lengkap -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" name="nama_lengkap" class="form-control form-control-lg"
              placeholder="Siapa nama lengkap kamu?" />
            <label class="form-label" for="form3Example3">Nama Lengkap</label>
          </div>

          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" name="nama_panggilan" class="form-control form-control-lg"
              placeholder="Kamu biasa dipanggil apa?" />
            <label class="form-label" for="form3Example3">Nama Panggilan</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" name="password" class="form-control form-control-lg"
              placeholder="Masukkan password yang mudah diingat" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <!-- Konfirmasi password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" name="conf_password" class="form-control form-control-lg"
              placeholder="Konfirmasi password" />
            <label class="form-label" for="form3Example4">Konfirmasi Password</label>
          </div>

         

          

          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="submit" name="register" value="Register" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">
            <p class="small fw-bold mt-2 pt-1 mb-5">Sudah punya akun? Yuk, langsung cuss <a href="login.php"
                class="link-danger" > Login!</a> </p>
          </div>

        </form>
      </div>
    </div>
  </div>
 

    
</section>






<?php
require_once 'view/footer.php';
 ?>