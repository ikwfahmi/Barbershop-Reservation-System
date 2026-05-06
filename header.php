<html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>BarberShop | <?php echo $_SESSION['judul']; unset($_SESSION['judul']);?></title>
        <link href="http://localhost/Barbershop-Reservation-System/public/css/bootstrap.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                        <a class="navbar-brand" href="">
                                <img src="http://localhost/Barbershop-Reservation-System/public/img/logo.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                                        <a class="nav-link" href="kapster.php">Kapster</a>
                                        <a class="nav-link" href="">Layanan</a>
                                        <div class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: inherit;">
                                                        Pesanan
                                                </a>
                                                <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Menunggu</a></li>
                                                        <li><a class="dropdown-item" href="#">Selesai</a></li>
                                                </ul>
                                        </div>
                                        <a class="nav-link" href="">About</a>
                                </div>
                                        <ul class="navbar-nav ms-auto">
                                                <?php if(isset($_SESSION['login'])):?>
                                                <li class="nav-item">
                                                        <a class="nav-link" ><?php echo htmlspecialchars($_SESSION['user']); ?></a>
                                                </li>
                                                <li class="nav-item">
                                                        <a class="btn btn-danger" href="logout.php">Logout</a>
                                                </li>
                                        </ul>
                                        <?php else:?>
                                        <ul class="navbar-nav ms-auto">
                                                <?php if(basename($_SERVER['PHP_SELF']) != 'login.php'): ?>
                                                <li class="nav-item">
                                                        <a class="btn btn-success" href="login.php">Login</a>
                                                </li>
                                                <?php endif; ?>
                                        </ul>
                                        <?php endif;?>
                        </div>
                </div>
        </nav>