<?php
session_start();
include 'confog.php';

$id = $_SESSION['user_id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$notlp = $_POST['notlp'];

// Upload foto (opsional)
if (!empty($_FILES['foto']['name'])) {
    $target_dir = "img/";
    $file_name = time() . "_" . basename($_FILES["foto"]["name"]);
    $target_file = $target_dir . $file_name;
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

    $sql = "UPDATE register SET nama='$nama', email='$email', notlp='$notlp', foto='$file_name' WHERE id='$id'";
    $_SESSION['user_foto'] = $file_name;
} else {
    $sql = "UPDATE register SET nama='$nama', email='$email', notlp='$notlp' WHERE id='$id'";
}

if ($conn->query($sql)) {
    // Update session data
    $_SESSION['user_nama'] = $nama;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_notlp'] = $notlp;

    header("Location: profile.php");
    exit();
} else {
    echo "Gagal memperbarui profil: " . $conn->error;
}
?>
