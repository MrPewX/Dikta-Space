<?php
include 'sidebar.php';
$host = 'localhost';
$db = 'seva';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Hapus pengguna
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM register WHERE id = '$id'");
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: 'Berhasil!',
        text: 'Data pengguna berhasil dihapus.',
        icon: 'success',
        confirmButtonColor: '#FFD100'
      }).then(() => {
        window.location = 'user.php';
      });
    });
  </script>";
}

$result = $conn->query("SELECT * FROM register ORDER BY id DESC");
?>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<main class="col-md-10 ms-sm-auto px-4">
    <div class="container-fluid px-4 py-4">
        <h3 class="fw-bold text-dark mb-4">Daftar Pengguna</h3>
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-warning text-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Email</th>
                                <th scope="col">No. Telepon</th>
                                <th scope="col">Tanggal Daftar</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                        <td>
                                            <img src="../img/<?php echo htmlspecialchars($row['foto'] ?: 'default.png'); ?>" alt="Foto" class="rounded-circle" width="40" height="40">
                                        </td>
                                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                                        <td><?php echo htmlspecialchars($row['notlp']); ?></td>
                                        <td><?php echo htmlspecialchars($row['created_at'] ?? '-'); ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-danger text-white" onclick="confirmDelete(<?php echo $row['id']; ?>)">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-3">Belum ada pengguna terdaftar.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: 'Data pengguna ini akan dihapus permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#999',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = 'user.php?delete=' + id;
            }
        });
    }
</script>

<?php include 'footer.php'; ?>