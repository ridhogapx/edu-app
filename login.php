<?php

require_once 'core/init.php';

$error = '';

if(isset($_SESSION['user'])) {
    header('Location: index.php');
}

if(isset($_POST['login'])) {
    $nama = $_POST['username'];
    $pw = $_POST['password'];
    if(!empty(trim($nama)) && !empty(trim($pw)) ) {
        if(login_cek_nama($nama)) {
          if(cek_data($nama,$pw)) {
            $_SESSION['user'] = $nama;
            $_SESSION['msg']= "Berhasil login!";
            header('Location: index.php');
        } else {
          $error = "Password salah!";
        }
        } else {
          $error = "User tidak terdaftar!";
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
        <form method="POST" action="login.php">
         

          

          <!-- Email input -->
          <h2 class="mb-3">Login</h2>
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" name="username" class="form-control form-control-lg"
              placeholder="Masukkan username" />
            <label class="form-label" for="form3Example3">Username</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" name="password" class="form-control form-control-lg"
              placeholder="Masukkan password" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
           
           
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="login" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-5">Belum punya akun? Yuk <a href="register.php"
                class="link-danger" >Register</a> dulu.</p>
          </div>

        </form>
      </div>
    </div>
  </div>
 

    
</section>






<?php
require_once 'view/footer.php';
 ?>