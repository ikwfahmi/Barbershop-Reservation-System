<?php

    session_start();
    if(!$_SESSION['login'])header("Location: login.php");
    $_SESSION['judul'] = 'Dashboard';

    require 'header.php';
?>

<main class="container">
    <section class="hero">
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <span class="badge text-bg-light border mb-3">Reservasi Online</span>
                <h1 class="hero-title">Potongan Rapi, Jadwal Tanpa Ngantri</h1>
                <p class="hero-lead">
                    Selamat datang, <?php echo $_SESSION['user']; ?>. Pesan kursi barber favoritmu dalam beberapa klik dan nikmati pengalaman grooming yang lebih santai.
                </p>
                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="#layanan" class="btn btn-brand">Lihat Layanan</a>
                    <a href="logout.php" class="btn btn-ghost">Keluar</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-card">
                    <p class="text-uppercase small text-muted mb-2">Estimasi Antrian Hari Ini</p>
                    <p class="queue-stat mb-2">12 Slot</p>
                    <p class="mb-0 text-muted">Waktu ramai biasanya pukul 16:00 - 19:00. Datang lebih awal untuk antrean lebih singkat.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan" class="pb-5">
        <div class="row g-3">
            <div class="col-md-4">
                <article class="feature-card stagger-1">
                    <h2 class="feature-title">Classic Cut</h2>
                    <p class="feature-copy">Gaya clean dan presisi untuk tampilan profesional sehari-hari.</p>
                </article>
            </div>
            <div class="col-md-4">
                <article class="feature-card stagger-2">
                    <h2 class="feature-title">Beard Sculpt</h2>
                    <p class="feature-copy">Rapikan jenggot dengan contour detail agar wajah terlihat lebih tegas.</p>
                </article>
            </div>
            <div class="col-md-4">
                <article class="feature-card stagger-3">
                    <h2 class="feature-title">Hair Spa</h2>
                    <p class="feature-copy">Perawatan kulit kepala dan relaksasi singkat setelah aktivitas padat.</p>
                </article>
            </div>
        </div>
    </section>
</main>

<?php
    require 'footer.php';