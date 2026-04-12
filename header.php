<html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Halaman <?php echo $_SESSION['judul']; unset($_SESSION['judul']);?></title>
        <link href="http://localhost/Barbershop-Reservation-System/assets/css/bootstrap.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                        <a class="navbar-brand" href="">
                                <img src="http://localhost/Barbershop-Reservation-System/assets/img/logo.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                                        <a class="nav-link" href="">About</a>
                                </div>
                                <div class="collapse navbar-collapse">
                                        <?php if(isset($_SESSION['login'])):?>
                                        <ul class="navbar-nav ms-auto">
                                                <li class="nav-item">
                                                        <a class="nav-link" ><?php echo $_SESSION['user']; ?></a>
                                                </li>
                                                <li class="nav-item">
                                                        <a class="btn btn-danger" href="logout.php">Logout</a>
                                                </li>
                                        </ul>
                                        <?php else:?>
                                        <ul class="navbar-nav ms-auto">
                                                <li class="nav-item">
                                                        <a class="btn btn-success" href="login.php">Login</a>
                                                </li>
                                        </ul>
                                        <?php endif;?>
                                </div>
                        </div>
                </div>
        </nav>