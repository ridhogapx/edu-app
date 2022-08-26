<?php
require_once 'view/header.php';
require_once 'core/init.php';

$data = post_beranda();
$info_admin = cek_role();


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
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user me-2"></i>
            Akun
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Ganti Profile</a></li>
            <li><a class="dropdown-item" href="#">Akun Saya</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            
            
          </ul>
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
        <div class="row fs-5 mb-5">
          <div class="col">
            <p><?php echo $data['post']; ?>

            </p>
          </div>
          
        </div>

      </div>
      <?php if(cek_tingkat($_SESSION['user']) == 1) { ?>
      <div class="row text-center">
        <div class="col mb-5">
        <a class="btn btn-primary btn-lg" href="ubah_beranda.php" role="button">Ubah</a>
        </div>
      </div>
      <?php } ?>

    </div>
</section>

<section id="semarak" >
   <div class="container ">
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
    <?php while($get_info = mysqli_fetch_assoc($info_admin)) { ?>
      <div class="col-md-4 mb-3">
      <div class="card" style="width: 18rem;">
       <img src="assets/img_profile/default.jpeg" class="card-img-top" alt="Profile">
        <div class="card-body">
          <h5 class="card-title"><?php echo $get_info['nama']. " " . "#". $get_info['id'] ; ?></h5>
              <p class="card-text"><?php if($get_info['role'] == 1) {
                echo "Web Developer";
              } elseif($get_info['role']== 2) {
                echo "UI / UX & Designer";
              }elseif($get_info['role'] == 3){
                echo "Admin Web";
              }?></p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Lihat
</button>
  </div>
</div>
      </div>
      <?php } ?>
     
      
    </div>
  </div>
</section>

<!-- Modal -->
<?php
$id = $_GET['id'];

?>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>




<?php
require_once 'view/footer.php';
 ?>