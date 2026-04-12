<?php
    session_start();        
    $_SESSION['judul'] = 'Daftar';
    require 'header.php';
?>
<main class="container auth-wrap">
  <div class="row justify-content-center w-100">
    <div class="col-lg-7 col-md-9">
      <section class="auth-card">
        <h1 class="auth-title">Buat Akun Baru</h1>
        <p class="auth-subtitle">Daftar sekali untuk akses reservasi online kapan saja.</p>

        <?php if(isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
        <?php } ?>

        <form action="functions/submit.php" method="post">
          <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
          </div>
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
            </div>
            <div class="col-md-6">
              <label for="password2" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password" required>
            </div>
          </div>
          <div class="d-flex flex-wrap gap-2">
            <button type="button" class="btn btn-ghost" onclick="history.back()">Kembali</button>
            <button type="submit" class="btn btn-brand" name="daftar">Daftar Akun</button>
          </div>
        </form>
      </section>
    </div>
  </div>
</main>

<?php
    require 'footer.php';