<?php
    session_start();
    $_SESSION['judul'] = 'Login';
    require 'header.php';
?>
<main class="container auth-wrap">
  <div class="row justify-content-center w-100">
    <div class="col-lg-6 col-md-8">
      <section class="auth-card">
        <h1 class="auth-title">Selamat Datang</h1>
        <p class="auth-subtitle">Masuk untuk memesan jadwal barber favoritmu.</p>

        <?php if(isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
        <?php } elseif(isset($_SESSION['success'])) { ?>
        <div class="alert alert-success" role="alert">
          <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
        <?php } ?>

        <form action="functions/submit.php" method="post">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
          </div>
          <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
          </div>
          <button type="submit" class="btn btn-brand w-100" name="login">Masuk Sekarang</button>
        </form>
        <p class="mt-3 mb-0 text-muted">Belum punya akun? <a href="daftar.php">Daftar di sini</a></p>
      </section>
    </div>
  </div>
</main>
<?php
    require 'footer.php';