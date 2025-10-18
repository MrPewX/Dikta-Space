<?php

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
    
?>