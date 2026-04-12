<?php
        $pageTitle = isset($_SESSION['judul']) ? $_SESSION['judul'] : 'Barbershop';
        unset($_SESSION['judul']);
?>
<!doctype html>
<html lang="id">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Barbershop | <?php echo $pageTitle; ?></title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="http://localhost/Barbershop-Reservation-System/assets/css/bootstrap.css" rel="stylesheet">
        <link href="http://localhost/Barbershop-Reservation-System/assets/css/style.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 site-shell">
        <nav class="navbar navbar-expand-lg glass-nav sticky-top">
                <div class="container py-1">
                        <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
                                <img src="http://localhost/Barbershop-Reservation-System/assets/img/logo.png" alt="Logo Barbershop" width="46" height="46">
                                <span class="brand-font fs-3 mb-0">Klip & Co</span>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ms-lg-4 me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                                <a class="nav-link" href="index.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="index.php#layanan">Layanan</a>
                                        </li>
                                </ul>
                                <div class="d-flex align-items-center gap-2">
                                        <?php if(isset($_SESSION['login'])): ?>
                                        <span class="user-chip"><?php echo $_SESSION['user']; ?></span>
                                        <a class="btn btn-sm btn-soft-danger" href="logout.php">Logout</a>
                                        <?php else: ?>
                                        <a class="btn btn-sm btn-brand" href="login.php">Masuk</a>
                                        <a class="btn btn-sm btn-ghost" href="daftar.php">Daftar</a>
                                        <?php endif; ?>
                                </div>
                        </div>
                </div>
        </nav>