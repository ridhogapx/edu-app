<?php
require_once 'view/header.php';
require_once 'core/init.php';
$error = '';
$data = post_beranda();

if(isset($_POST['submit'])) {
    $box_edit = $_POST['box_edit'];
    if(!empty(trim($box_edit))) {
        update_post_beranda($box_edit);
        
        header('Location:index.php');
    } else {
        $error = "Tidak boleh kosong!";
    }
}


?>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm" id="navbar">
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
          <a class="nav-link" href="#"><i class="fa-solid fa-school me-2"></i>Lorong Kelas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-chalkboard me-2"></i>Papan Informasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-graduation-cap me-2"></i>Akun</a>
        </li>
        
       
        
      </ul>
    </div>
  </div>
</nav>



<section id="kotak">
<div class="container">
    <div class="row mt-3">
        <div class="col-md-8">
        <form method="POST" action="">
        <div class="mb-3">
        <h2>Ubah</h2>
        <?php if($error != '') { ?>
        <p id="error"><?php echo $error; ?></p>
        <?php } ?>
        <div class="mb-3">
        <textarea class="form-control" id="box_edit" rows="20" name="box_edit"><?php echo $data['post']; ?></textarea>
        </div>
    
        </div>
        
  
        <button type="submit" class="btn btn-primary btn-lg mb-3" name="submit">Submit</button>
</form>
        </div>
    </div>
</div>

</section>





<?php
require_once 'view/footer.php';
 ?>