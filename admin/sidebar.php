<?php session_start();
// pastikan koneksi $conn tersedia. Jika belum, buat koneksi:
if (!isset($conn)) {
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'seva';
    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    if ($conn->connect_error) {
        die("Koneksi DB gagal: " . $conn->connect_error);
    }
}
 ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Kuning Hitam Putih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fff;
            color: #000;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar {
            background-color: #000;
            min-height: 100vh;
            color: #fff;
        }

        .sidebar .nav-link {
            color: #fff;
            border-left: 4px solid transparent;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #222;
            border-left: 4px solid #ffcc00;
        }

        .navbar {
            background-color: #ffcc00;
        }

        .card {
            border: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #000;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php
            $current_page = basename($_SERVER['PHP_SELF']);
            ?>
            <nav class="col-md-2 d-md-block sidebar py-4">
                <div class="text-center mb-4">
                    <h4 class="fw-bold text-warning">Admin Panel</h4>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="index.php">🏠 Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'produk.php') ? 'active' : ''; ?>" href="produk.php">📦 Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'user.php') ? 'active' : ''; ?>" href="user.php">👥 Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'pengaturan.php') ? 'active' : ''; ?>" href="pengaturan.php">⚙️ Pengaturan</a>
                    </li>
                </ul>
            </nav>