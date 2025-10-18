<?php 
include 'header.php';

// Koneksi ke database
$host = 'localhost';
$db = 'seva'; 
$user = 'root'; 
$pass = ''; 

$conn = new mysqli($host, $user, $pass, $db);

?>

<!-- Tambahkan SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['nama'];
  $email    = $_POST['email'];
  $notlp    = $_POST['notlp'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO register (nama, email, notlp, password) 
          VALUES ('$username', '$email', '$notlp', '$password')";

  if ($conn->query($sql) === TRUE) {
    // SweetAlert sukses
    echo "
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          title: 'Registrasi Berhasil!',
          text: 'Akun Anda telah berhasil dibuat.',
          icon: 'success',
          confirmButtonColor: '#FFD100',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = 'mulai.php';
          }
        });
      });
    </script>";
  } else {
    // SweetAlert error
    echo "
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          title: 'Gagal Mendaftar!',
          text: 'Terjadi kesalahan: " . addslashes($conn->error) . "',
          icon: 'error',
          confirmButtonColor: '#FFD100'
        });
      });
    </script>";
  }
}
?>

<!-- Section Registrasi -->
<section class="container py-5">
  <div class="row align-items-center">
    <!-- Kiri -->
    <div class="col-lg-6 text-center text-lg-start mb-5 mb-lg-0">
      <h1 class="fw-bold mb-3">Selamat Datang di <span class="text-warning">Dikta Space</span></h1>
      <p class="text-muted mb-4">
        Tempat belajar dan berbagi kreativitas digital.  
        Yuk, daftar sekarang dan jadi bagian dari komunitas kami!
      </p>
      <img src="../assets/dikta2.png" alt="Ilustrasi" class="img-fluid rounded shadow-sm" style="max-width:80%;">
    </div>

    <!-- Kanan (Form) -->
    <div class="col-lg-5 offset-lg-1">
      <div class="card border-0 shadow p-4">
        <h3 class="fw-bold mb-4 text-center">Buat Akun</h3>
        <form method="POST" action="">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama Anda" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email Anda" required>
          </div>
          <div class="mb-3">
            <label for="notlp" class="form-label">No. Telepon</label>
            <input type="text" name="notlp" id="notlp" class="form-control" placeholder="Masukkan nomor telepon" required>
          </div>
          <div class="mb-4">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
          </div>
          <button type="submit" class="btn btn-warning w-100 fw-semibold text-dark">Daftar Sekarang</button>
        </form>
        <p class="text-center mt-3 text-muted">
          Sudah punya akun? <a href="login.php" class="text-warning fw-semibold text-decoration-none">Masuk</a>
        </p>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
