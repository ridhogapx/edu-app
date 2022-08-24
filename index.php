<?php
require_once 'view/header.php';
require_once 'core/init.php';

$data = post_beranda();
?>

<nav class="navbar fixed-top navbar-expand-lg bg-primary navbar-dark shadow-sm" id="navbar">
  <div class="container">
    <a class="navbar-brand" href="index.php"><img src="assets/logo_edu2.png" alt="logo" width="150"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto" >
        <li class="nav-item">
          <a class="nav-link active me-3" aria-current="page" href="index.php"><i class="fa-solid fa-house m me-2" ></i>Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lorong_kelas.php"><i class="fa-solid fa-school me-2"></i>Lorong Kelas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-chalkboard me-2"></i>Papan Informasi</a>
        </li>
        <?php if(!isset($_SESSION['user'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="fa-solid fa-graduation-cap me-2"></i>Akun</a>
        </li>
        <?php } ?>


        <?php if(isset($_SESSION['user'])) {?>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="fa-solid fa-graduation-cap me-2"></i>Logout</a>
        </li>
        <?php } ?>
        
       
        
      </ul>
    </div>
  </div>
</nav>

<?php if(isset($_SESSION['msg'])) { ?>
<section id="msg">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="alert alert-success animate__animated animate__backInLeft" role="alert">
                <?php echo $_SESSION['msg'];
                      unset($_SESSION['msg']); ?>
            </div>
        </div>
      </div>
    </div>
</section>
<?php } ?>

<section class="jumbotron text-center animate__animated animate__backInLeft mt-5" >
  <img src="assets/maskot.png" alt="maskot" >
  <h1 class="display-4">Halo, selamat malam!</h1>
  <p class="lead fs-5">Selamat datang di MUTU Edu </p>
  
</section>

<section id="tentang" >
    <div class="container animate__animated animate__backInRight">
      <div class="row text-center mt-4">
        <div class="col mb-3">
          <h2>Apa itu MUTU Edu?</h2>
        </div>
        <div class="row fs-5">
          <div class="col">
            <p><?php echo $data['post']; ?>

            </p>
          </div>
          
        </div>

      </div>
      <div class="row text-center">
        <div class="col">
        <a class="btn btn-primary btn-lg" href="ubah_beranda.php" role="button">Ubah</a>
        </div>
      </div>

    </div>
</section>

<section id="semarak" >
   <div class="container">
    <div class="row text-center mb-5">
      <div class="col">
        <h2>Bangun digitalisasi dalam dunia pendidikan!</h2>
        <p class="fs-5">Belajar lebih efektif dengan materi digital.</p>
        <a class="btn btn-primary btn-lg" href="lorong_kelas.php" role="button">Ayo Belajar!</a>
      </div>
      
    </div>
   </div>
</section>

<section id="about_us">
  <div class="container">
    <div class="row text-center mb-3">
      <div class="col">
        <h2>Tentang Kami</h2>
      </div>
    </div>
    <div class="row justify-content-center ">
      <div class="col-md-4 mb-3">
      <div class="card" style="width: 18rem;">
       <img src="assets/img_profile/default.jpeg" class="card-img-top" alt="Profile">
        <div class="card-body">
          <h5 class="card-title">Ridho Galih Pambudi</h5>
              <p class="card-text">Web Developer</p>
                <a href="#" class="btn btn-primary">Lihat Profile</a>
  </div>
</div>
      </div>
      <div class="col-md-4 mb-3">
      <div class="card" style="width: 18rem;">
       <img src="assets/img_profile/default.jpeg" class="card-img-top" alt="Profile">
        <div class="card-body">
          <h5 class="card-title">Ridwan Rafli Hidayat</h5>
              <p class="card-text">Admin Web</p>
                <a href="#" class="btn btn-primary">Lihat Profile</a>
  </div>
</div>
      </div>
      <div class="col-md-4 mb-3">
      <div class="card" style="width: 18rem;">
       <img src="assets/img_profile/default.jpeg" class="card-img-top" alt="Profile">
        <div class="card-body">
          <h5 class="card-title">Ahmad Zakariya</h5>
              <p class="card-text">UI / UX & Designer</p>
                <a href="#" class="btn btn-primary">Lihat Profile</a>
  </div>
</div>
      </div>
    </div>
  </div>
</section>




<?php
require_once 'view/footer.php';
 ?>