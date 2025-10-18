<?php

// Cegah akses tanpa login
include 'header.php';
?>

<style>
  body {
    background: linear-gradient(to bottom right, #fffbe6, #ffffff);
    font-family: 'Poppins', sans-serif;
  }
  .profile-card {
    background-color: #111;
    color: #fff;
    border-radius: 1rem;
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    transition: 0.3s;
  }
  .profile-card:hover { transform: translateY(-5px); }
  .profile-image {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 4px solid #FFD100;
    object-fit: cover;
  }
  .btn-warning {
    background-color: #FFD100;
    border: none;
    color: #111;
    font-weight: 600;
    transition: 0.3s;
  }
  .btn-warning:hover {
    background-color: #ffce00;
    color: #000;
  }
  .info-label { color: #FFD100; font-weight: 500; margin-bottom: 0.25rem; }
  .divider {
    border-top: 1px solid rgba(255,255,255,0.15);
    margin: 1.5rem 0;
  }
</style>

<div class="container py-5">
  <div class="text-center mb-4">
    <h2 class="fw-bold text-dark">Profil Pengguna</h2>
    <p class="text-muted">Informasi akun Anda di Dikta Space</p>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card profile-card p-4 text-center">
        <div class="mb-3">
          <img src="img/<?php echo $_SESSION['user_foto']; ?>" alt="Foto Profil" class="profile-image mb-3">
          <h4 class="fw-bold mb-1"><?php echo $_SESSION['user_nama']; ?></h4>
        </div>

        <div class="divider"></div>

        <div class="text-start">
          <div class="mb-3">
            <p class="info-label">Email</p>
            <p class="mb-0"><?php echo $_SESSION['user_email']; ?></p>
          </div>
          <div class="mb-3">
            <p class="info-label">Nomor HP</p>
            <p class="mb-0"><?php echo $_SESSION['user_notlp']; ?></p>
          </div>
          <div>
            <p class="info-label">Bergabung Sejak</p>
            <p class="mb-0"><?php echo $_SESSION['created_at']; ?></p>
          </div>
        </div>

        <div class="mt-4">
          <button class="btn btn-warning px-4" data-bs-toggle="modal" data-bs-target="#editModal">
            Edit Profil
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL EDIT PROFIL -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="update_profile.php" method="POST" enctype="multipart/form-data" class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title text-dark fw-bold" id="editModalLabel">Edit Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3 text-center">
          <img src="https://via.placeholder.com/100" class="rounded-circle mb-2" style="width:100px;height:100px;object-fit:cover;">
          <input type="file" class="form-control" name="foto">
        </div>
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" value="<?php echo $_SESSION['user_nama']; ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['user_email']; ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Nomor HP</label>
          <input type="text" class="form-control" name="notlp" value="<?php echo $_SESSION['user_notlp']; ?>">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning text-dark fw-bold">Simpan</button>
      </div>
    </form>
  </div>
</div>


<?php include 'footer.php'; ?>
