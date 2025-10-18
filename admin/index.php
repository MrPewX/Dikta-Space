<?php
include 'sidebar.php';

// 1) Dapatkan total pengguna
$totalUsers = 0;
$res = $conn->query("SELECT COUNT(*) AS total FROM register");
if ($res && $row = $res->fetch_assoc()) {
    $totalUsers = (int) $row['total'];
}

// 2) Dapatkan pengguna terbaru (menggunakan created_at jika ada, fallback ke id)
$latestUserName = '-';
$latestUserCreated = null;
$qLatest = $conn->query("SELECT nama, created_at FROM register ORDER BY 
    COALESCE(created_at, '1970-01-01') DESC, id DESC LIMIT 1");
if ($qLatest && $qLatest->num_rows > 0) {
    $rLatest = $qLatest->fetch_assoc();
    $latestUserName = $rLatest['nama'];
    $latestUserCreated = $rLatest['created_at'];
}

?>

<!-- MAIN CONTENT (masukkan ini di posisi main area) -->
<main class="col-md-10 ms-sm-auto px-4">
  <nav class="navbar navbar-expand-lg navbar-light shadow-sm my-3 rounded">
    <div class="container-fluid">
      <span class="navbar-brand fw-bold">Dashboard</span>
      <div class="d-flex align-items-center">
        <span class="fw-bold me-3">Admin</span>
        <img src="https://via.placeholder.com/40" class="rounded-circle" alt="Admin">
      </div>
    </div>
  </nav>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card p-3">
        <h5 class="card-title">Total Pengguna</h5>
        <p class="fs-3 fw-bold text-warning"><?php echo number_format($totalUsers); ?></p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-3">
        <h5 class="card-title">Total Produk</h5>
        <p class="fs-3 fw-bold text-warning">320</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-3">
        <h5 class="card-title">Penjualan Bulan Ini</h5>
        <p class="fs-3 fw-bold text-warning">Rp 85.500.000</p>
      </div>
    </div>
  </div>

  <div class="card mt-4">
    <div class="card-header bg-warning text-dark fw-bold">Aktivitas Terbaru</div>
    <div class="card-body">
      <ul class="list-group list-group-flush">
        <!-- Contoh: pesanan baru statis -->
        <li class="list-group-item">🛒 Pesanan baru dari <b>Rina</b></li>

        <!-- Tampilkan baris pengguna terbaru dari DB -->
        <?php if ($latestUserName !== '-') : ?>
          <li class="list-group-item">👤 Pengguna baru terdaftar: <b><?php echo htmlspecialchars($latestUserName); ?></b>
            <?php if (!empty($latestUserCreated)) {
              // format tanggal jika tersedia
              $dt = date_create($latestUserCreated);
              if ($dt) {
                echo ' <small class="text-muted">(' . date_format($dt, 'd M Y H:i') . ')</small>';
              }
            } ?>
          </li>
        <?php else: ?>
          <li class="list-group-item text-muted">Belum ada pengguna terdaftar.</li>
        <?php endif; ?>

        <!-- (Opsional) Tampilkan 3 pengguna terbaru -->
        <?php if (!empty($recentUsers)): ?>
          <li class="list-group-item"><small class="text-muted">Pengguna terbaru:</small></li>
        <?php endif; ?>

        <!-- Contoh kegiatan lain -->
        <li class="list-group-item">📦 Produk “Sepatu Kuning” diperbarui stoknya</li>
      </ul>
    </div>
  </div>
</main>
