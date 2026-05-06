<?php
    session_start();
    $_SESSION['judul'] = 'Kapster';
    require 'header.php';
    require 'autoload.php';
    $database = new Database();
    $db = $database->connect();
    $kaps = new Kapster($db);
    if(isset($_POST['tambah'])){
        if($kaps->insert_data($_POST) > 0){
            header("Location: kapster.php");
        }else{
            header("Location: kapster.php");
        }
    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $kapster = $kaps->getKapster($id);
    }

    $kapsters = $kaps->getAllKapsters();

?>
<div class="container mt-5">
    <div class="row g-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data
        </button>
        <?php foreach ($kapsters as $k) : ?>
            <div class="col-md-3 col-6 text-center"> 
                <div class="card h-100 border-0 shadow-sm p-3">
                    <div class="d-flex justify-content-center">
                        <img src="public/img/<?= $k['foto']; ?>" 
                             class="rounded-circle img-thumbnail" 
                             alt="<?= htmlspecialchars($k['nama_kapster']); ?>"
                             style="width: 120px; height: 120px; object-fit: cover;">
                    </div>
                    
                    <div class="card-body px-0">
                        <h6 class="fw-bold mb-1"><?= htmlspecialchars($k['nama_kapster']); ?></h6>
                        <p class="text-muted small mb-3"><?= $k['status']; ?></p>
                    </div>
                    <button href="kapster.php?edit=<?= $k['id']; ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                            Edit
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_kapster" class="form-label">Nama Kapster</label>
                <input type="text" class="form-control" id="nama_kapster" name="nama_kapster" value="<?= $kapster['nama_kapster']; ?>"required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"name="tambah">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_kapster" class="form-label">Nama Kapster</label>
                <input type="text" class="form-control" id="nama_kapster" name="nama_kapster" value="<?= $kapster['nama_kapster']; ?>"required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"name="tambah">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
    require 'footer.php';