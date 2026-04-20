<?php
    session_start();
    $_SESSION['judul'] = 'Login';
    require 'header.php';
    require 'autoload.php';
    $database = new Database();
    $db = $database->connect();
    $user = new User($db);
    if(isset($_POST['login'])){
        if($user->login($_POST) > 0){
            header("Location: index.php");
            exit;
        }else{
            header("Location: login.php");
            exit;
        }
    }
?>
<div class="container d-flex flex-column min-vh-100 justify-content-center">

  <div class="row justify-content-center">
      <div class="col-md-4">
        <?php if(isset($_SESSION['error'])){?>
          <div class="alert alert-danger" role="alert">
              <?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
          </div>
        <?php }elseif(isset($_SESSION['success'])){?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success'];unset($_SESSION['success']); ?>
        </div>
        <?php }?>
      </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card shadow">
        <div class="card-body">
          <h5 class="text-center mb-4">Login</h5>
          <form action="" method="post">
            <div class="row mb-3">
              <div class="col-sm-15">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-15">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
          </form>
          <p>Belum punya akun? <a href="daftar.php">Daftar</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
    require 'footer.php';