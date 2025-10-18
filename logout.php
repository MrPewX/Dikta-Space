<?php
session_start();

// Hapus variabel session secara manual
session_unset(); // Hapus semua variabel session

// Pastikan variabel spesifik juga dihapus
unset($_SESSION['user_login']);
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['notlp']);


// Hapus cookie terkait, jika digunakan
setcookie('id', '', time() - 3600, '/');
setcookie('key', '', time() - 3600, '/');

// Clear sessionStorage di browser dan redirect
echo "<script>
    sessionStorage.clear();
    window.location.href = 'index.php'; // Redirect ke halaman login
</script>";

exit;
?>