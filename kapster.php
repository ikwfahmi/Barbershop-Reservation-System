<?php
    session_start();
    if(!$_SESSION['login'])header("Location: login.php");
    $_SESSION['judul'] = 'Dashboard';
    require 'header.php';
    require 'autoload.php';
    $database = new Database();
    $db = $database->connect();
    $kapster = new Kapster($db);
    $kapsters = $kapster->getAllKapsters();

?>
<div class="container mt-5">
    <div class="row g-4">
        <?php foreach ($kapsters as $k) : ?>
            <div class="col-md-3 col-6 text-center"> 
                <div class="card h-100 border-0 shadow-sm p-3">
                    <div class="d-flex justify-content-center">
                        <img src="<?= $k['foto']; ?>" 
                             class="rounded-circle img-thumbnail" 
                             alt="<?= $k['nama_kapster']; ?>"
                             style="width: 120px; height: 120px; object-fit: cover;">
                    </div>
                    
                    <div class="card-body px-0">
                        <h6 class="fw-bold mb-1"><?= $k['nama_kapster']; ?></h6>
                        <p class="text-muted small mb-3"><?= $k['status']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
    require 'footer.php';