<?php
    session_start();        
    $_SESSION['judul'] = 'Daftar';
    require 'header.php';
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
  <form action="functions/submit.php" method="post">
    <div class="mb-3">
      <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
      <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
    </div>
    <div class="mb-3">
      <label for="password2" class="form-label">Konfirmasi Password</label>
      <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password" required>
    </div>
    <button type="button" class="btn btn-danger" onclick="history.back()">Kembali</button>
    <button type="submit" class="btn btn-primary" name="daftar">Daftar</button>
  </form>
</div>

<?php
    require 'footer.php';