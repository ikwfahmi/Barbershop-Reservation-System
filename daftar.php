<?php
    session_start();        
    $_SESSION['judul'] = 'Daftar';
    require 'header.php';
    require 'autoload.php';
    $database = new Database();
    $db = $database->connect();
    $user = new User($db);
    if(isset($_POST['daftar'])){
      if($user->register($_POST) > 0){
        header("Location: login.php");
        exit;
      }elseif($user->register($_POST) === -1){
        header("Location: login.php");
        exit;
      }else{
        header("Location: daftar.php");
        exit;
      }
    }
?>
<div class="container mt-5">
  <div class="row">
        <div class="col-lg-6">
    <?php if(isset($_SESSION['error'])){?>
          <div class="alert alert-danger" role="alert">
              <?php echo $_SESSION['error']; 
                    unset($_SESSION['error']);?>
          </div>
    <?php }?>
      </div>
  </div>
  <form action="" method="post">
    <div class="mb-3">
      <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
    </div>
    <div class="mb-3">
      <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
    </div>
    <div class="mb-3">
      <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password" required>
    </div>
    <button type="button" class="btn btn-danger" onclick="history.back()">Kembali</button>
    <button type="submit" class="btn btn-primary" name="daftar">Daftar</button>
  </form>
</div>

<?php
    require 'footer.php';