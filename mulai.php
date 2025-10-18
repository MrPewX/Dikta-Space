<?php
include 'header.php';

// Koneksi database
$host = 'localhost';
$db   = 'seva';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

// Jika koneksi gagal
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  $sql = "SELECT * FROM register WHERE email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
      $_SESSION['user_id']   = $row['id'];
      $_SESSION['user_nama'] = $row['nama'];
      $_SESSION['user_email'] = $row['email'];
      $_SESSION['user_notlp'] = $row['notlp'];
      $_SESSION['created_at'] = $row['created_at'];
      $_SESSION['user_foto'] = $row['foto'];


      echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Login berhasil. Selamat datang!',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ffc107'
                }).then(() => {
                    window.location = 'index.php';
                });
            </script>";
    } else {
      echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Password salah!',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ffc107'
                }).then(() => {
                    window.location = 'mulai.php';
                });
            </script>";
    }
  } else {
    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Email tidak ditemukan!',
                confirmButtonText: 'OK',
                confirmButtonColor: '#ffc107'
            }).then(() => {
                window.location = 'mulai.php';
            });
        </script>";
  }
}
?>
<!-- Halaman Login -->
<section class="container py-5">
  <div class="row justify-content-center align-items-center">
    <div class="col-md-6 col-lg-5">
      <div class="card shadow border-0">
        <div class="card-body p-4">
          <h3 class="text-center fw-bold mb-4">Login Pengguna</h3>
          <form method="post" action="">
            <div class="mb-3">
              <label for="email" class="form-label">Email Pengguna</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email Anda" required>
            </div>
            <div class="mb-4">
              <label for="password" class="form-label">Kata Sandi</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-warning w-100 fw-semibold text-dark">Masuk</button>
          </form>
          <p class="text-center mt-3 text-muted">
            Belum punya akun? <a href="daftar.php" class="text-warning fw-semibold text-decoration-none">Daftar Sekarang</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>