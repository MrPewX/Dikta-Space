<?php session_start(); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dikta Space</title>
    <link rel="stylesheet" href="styles/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<header class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
    <div class="container-fluid">
        <!-- Logo di kiri -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="../assets/Dikta-resized.png" alt="Logo" class="me-2" style="height:40px;">
            <span><span class="fw-bold text-dark">Dikta</span><span class="text-warning">Space</span></span>
        </a>

        <!-- Tombol toggle untuk mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Isi Navbar -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav mb-5 gap-3 mb-lg-0 text-center">
                <?php if (isset($_SESSION['user_nama'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="tugas.php">Tugas</a></li>
                <li class="nav-item"><a class="nav-link" href="galeri.php">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang Saya</a></li>
            </ul>
        </div>

        <!-- Tombol Login / Logout di kanan -->
        <div class="d-flex">
            <?php if (!isset($_SESSION['user_nama'])): ?>
                <a href="mulai.php" class="btn btn-dark ms-2">Login</a>
            <?php else: ?>
                <a href="logout.php" class="btn btn-dark ms-2">Logout</a>
            <?php endif; ?>
        </div>
    </div>
</header>