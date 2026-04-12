<?php
    session_start();
    $_SESSION['judul'] = 'Login';
    require 'header.php';
?>
<div class="container mt-5">

    <div class="row">
        <div class="col-lg-6">
    <?php if(isset($_SESSION['error'])){?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['error'];
                  unset($_SESSION['error']); ?>
        </div>
        <?php }elseif(isset($_SESSION['success'])){?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success'];
                  unset($_SESSION['success']); ?>
        </div>
    <?php }?>
        </div>
    </div>


<form action="functions/submit.php" method="post">
  <div class="row mb-3">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
    </div>
  </div>
  <div class="row mb-3">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>
<p>Belum punya akun? <a href="daftar.php">Daftar</a></p>


</div>